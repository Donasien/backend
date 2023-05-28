<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
    public function donate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'donate' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Donasi Gagal',
                'data' => $validator->errors()
            ]);
        }

        $donor = new Donor();
        if ($request->token) {
            $user = User::where('token', $request->token)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token Tidak Ditemukan',
                    'data' => null
                ]);
            }
            $donor->user_id = $user->id;
        }

        $donor->donation_id = $request->donation_id;

        if ($request->token) {
            $user = User::where('token', $request->token)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token Tidak Ditemukan',
                    'data' => null
                ]);
            }
            $donor->fullname = $user->fullname;
        } else {
            $donor->fullname = 'Anonim';
        }

        if ($request->message) {
            $donor->message = $request->message;
        }

        $donor->donate = $request->donate;

        $donor->save();

        $donation = Donation::where('id', $donor->donation_id)->first();

        $donation->latest_amount = $donation->latest_amount + $donor->donate;

        if ($donation->latest_amount >= $donation->target_amount) {
            $donation->status = 'finish';
        }

        $donation->update();

        return response()->json([
            'success' => true,
            'message' => 'Donate Berhasil',
            'data' => $donor,
            'total_donasi' => $donation->latest_amount,
        ]);
    }

    public function donation_history(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Load Riwayat Donasi Gagal',
                'data' => $validator->errors()
            ]);
        }

        $user = User::where('token', $request->token)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Token Tidak Ditemukan',
                'data' => null
            ]);
        }

        $donor = Donor::where('user_id', $user->id)->with('user')->with('donation')->get();

        $donor->each(function ($item) {
            $item->user->makeHidden(['roles', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);

            $item->donation->makeHidden(['user_id', 'kk', 'phone', 'address', 'ktp_photo', 'medical_photo', 'disease_photo', 'house_photo', 'created_at', 'updated_at']);
        });

        return response()->json([
            'success' => true,
            'message' => 'Load Riwayat Donasi Berhasil',
            'data' => $donor
        ]);
    }
}
