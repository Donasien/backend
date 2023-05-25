<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
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
            'target_amount' => 'required',
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
            $donation->cover_photo = $request->file('cover_photo')->store('raise-donation-photo');
        }
        if ($request->file('ktp_photo')) {
            $donation->ktp_photo = $request->file('ktp_photo')->store('raise-donation-photo');
        }
        if ($request->file('medical_photo')) {
            $donation->medical_photo = $request->file('medical_photo')->store('raise-donation-photo');
        }
        if ($request->file('disease_photo')) {
            $donation->disease_photo = $request->file('disease_photo')->store('raise-donation-photo');
        }
        if ($request->file('house_photo')) {
            $donation->house_photo = $request->file('house_photo')->store('raise-donation-photo');
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

        return response()->json([
            'success' => true,
            'message' => 'Load Status Donasi Berhasil',
            'data' => $donation
        ]);
    }
}
