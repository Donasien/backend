<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function all_donation()
    {
        $donation = Donation::get();

        $donation->makeHidden(['user_id', 'kk', 'phone', 'address', 'ktp_photo', 'medical_photo', 'disease_photo', 'house_photo', 'created_at', 'updated_at']);

        $today = Carbon::today();

        $donation = $donation->filter(function ($item) use ($today) {
            $item->days_left = $today->diffInDays($item->end_date);
            return $item->days_left > 0;
        });

        return response()->json([
            'success' => true,
            'message' => 'Load Semua Donasi Berhasil',
            'data' => $donation,
        ]);
    }

    public function detail_donation(Request $request)
    {
        $donation = Donation::where('id', $request->donation_id)->with('user')->first();

        if (!$donation) {
            return response()->json([
                'success' => false,
                'message' => 'Id Tidak Ditemukan',
                'data' => null
            ]);
        }

        $today = Carbon::today();

        $donation->days_left = $today->diffInDays($donation->end_date);

        $donation->makeHidden(['user_id', 'kk', 'phone', 'address', 'ktp_photo', 'medical_photo', 'disease_photo', 'house_photo', 'created_at', 'updated_at']);
        $donation->user->makeHidden(['roles', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Load Detail Donasi Berhasil',
            'data' => $donation,
        ]);
    }

    public function submit_donation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'fullname' => 'required',
            'gender' => 'required',
            'kk' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'title' => 'required',
            'target_amount' => 'required|integer',
            'end_date' => 'required',
            'description' => 'required',
            'cover_photo' => 'required',
            'ktp_photo' => 'required',
            'medical_photo' => 'required',
            'disease_photo' => 'required',
            'house_photo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Update Profile Gagal',
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

        $donation = new Donation();
        $donation->user_id = $user->id;
        $donation->fullname = $request->fullname;
        $donation->gender = $request->gender;
        $donation->kk = $request->kk;
        $donation->phone = $request->phone;
        $donation->address = $request->address;
        $donation->title = $request->title;
        $donation->target_amount = $request->target_amount;
        $donation->end_date = $request->end_date;
        $donation->description = $request->description;
        if ($request->file('cover_photo')) {
            $baseUrl = url('/');
            $donation->cover_photo = $baseUrl . '/storage/' . $request->file('cover_photo')->store('raise-donation-photo');
        }
        if ($request->file('ktp_photo')) {
            $baseUrl = url('/');
            $donation->ktp_photo = $baseUrl . '/storage/' . $request->file('ktp_photo')->store('raise-donation-photo');
        }
        if ($request->file('medical_photo')) {
            $baseUrl = url('/');
            $donation->medical_photo = $baseUrl . '/storage/' . $request->file('medical_photo')->store('raise-donation-photo');
        }
        if ($request->file('disease_photo')) {
            $baseUrl = url('/');
            $donation->disease_photo = $baseUrl . '/storage/' . $request->file('disease_photo')->store('raise-donation-photo');
        }
        if ($request->file('house_photo')) {
            $baseUrl = url('/');
            $donation->house_photo = $baseUrl . '/storage/' . $request->file('house_photo')->store('raise-donation-photo');
        }

        $donation->save();

        return response()->json([
            'success' => true,
            'message' => 'Submit Galang Donasi Berhasil',
            'data' => $donation
        ]);
    }

    public function donation_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Load Status Donasi Gagal',
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

        $donation = Donation::where('user_id', $user->id)->get();

        $donation->makeHidden(['user_id', 'kk', 'phone', 'address', 'ktp_photo', 'medical_photo', 'disease_photo', 'house_photo', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Load Status Donasi Berhasil',
            'data' => $donation
        ]);
    }
}
