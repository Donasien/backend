<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Donor;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function all_donation()
    {
        $donation = Donation::where('status', 'accept')->get();

        foreach ($donation as $item) {
            $item->updateStatus();
        }

        $donation->makeHidden(['user_id', 'type_disaster', 'result_alzheimer', 'result_lung', 'ktp_photo', 'medical_photo', 'disease_photo', 'sktm_photo', 'created_at', 'updated_at']);

        $today = Carbon::today();

        $donation = $donation->filter(function ($item) use ($today) {
            if ($today >= $item->end_date) {
                return false;
            } else {
                $item->days_left = $today->diffInDays($item->end_date);
                return true;
            }
        });

        $donation = array_values($donation->toArray());

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

        $donation->makeHidden(['user_id', 'type_disaster', 'result_alzheimer', 'result_lung', 'ktp_photo', 'medical_photo', 'disease_photo', 'sktm_photo', 'created_at', 'updated_at']);
        $donation->user->makeHidden(['roles', 'bank', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);

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
            'title' => 'required',
            'target_amount' => 'required|integer',
            'end_date' => 'required',
            'description' => 'required',
            'type_disaster' => 'required',
            'cover_photo' => 'required',
            'ktp_photo' => 'required',
            'medical_photo' => 'required',
            'disease_photo' => 'required',
            'sktm_photo' => 'required',
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
        $donation->title = $request->title;
        $donation->target_amount = $request->target_amount;
        $donation->end_date = $request->end_date;
        $donation->description = $request->description;
        $donation->type_disaster = $request->type_disaster;
        $donation->status = 'pending';
        $donation->result_alzheimer = $request->result_alzheimer;
        $donation->result_lung = $request->result_lung;
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
        if ($request->file('sktm_photo')) {
            $baseUrl = url('/');
            $donation->sktm_photo = $baseUrl . '/storage/' . $request->file('sktm_photo')->store('raise-donation-photo');
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

        $donation = Donation::where('user_id', $user->id)->latest()->first();

        if (!$donation) {
            $data['status_donation'] = null;
        } else {
            $data['status_donation'] = $donation->status;
        }

        if (is_null($user->gender) || is_null($user->address) || is_null($user->phone) || is_null($user->kk) || is_null($user->bank) || is_null($user->rekening)) {
            $data['status_data'] = false;
        } else {
            $data['status_data'] = true;
        }

        return response()->json([
            'success' => true,
            'message' => 'Load Status Donasi Berhasil',
            'data' => $data
        ]);
    }


    public function data_donation()
    {
        $donation = Donation::latest()->get();

        $today = Carbon::today();

        $donation = $donation->filter(function ($item) use ($today) {
            if ($today > $item->end_date) {
                $item->days_left = 'Berakhir';
            } else {
                $item->days_left = $today->diffInDays($item->end_date);
            }
            return true;
        });

        return view('Donations.index', compact('donation'));
    }

    public function read_donation($id)
    {
        $donation = Donation::where('id', $id)->first();

        $today = Carbon::today();

        if ($today > $donation->end_date) {
            $donation->days_left = 'Berakhir';
        } else {
            $donation->days_left = $today->diffInDays($donation->end_date);
        }

        return view('Donations.read', compact('donation'));
    }

    public function accept_donation($id)
    {
        $donation = Donation::where('id', $id)->first();

        $donation->status = 'accept';

        $donation->update();

        return redirect('/donasi');
    }

    public function decline_donation($id)
    {
        $donation = Donation::where('id', $id)->first();

        $donation->status = 'decline';

        $donation->update();

        return redirect('/donasi');
    }

    public function finish_donation($id)
    {
        $donation = Donation::where('id', $id)->first();

        $donation->status = 'finish';

        $donation->update();

        return redirect('/donasi');
    }

    public function edit_donation($id)
    {
        $donation = Donation::where('id', $id)->first();

        return view('Donations.edit', compact('donation'));
    }

    public function update_donation(Request $request, $id)
    {
        $donation = Donation::where('id', $id)->first();

        $donation->title = $request->title;
        $donation->target_amount = $request->target_amount;
        $donation->end_date = $request->end_date;
        $donation->description = $request->description;
        if ($request->file('cover_photo')) {
            $baseUrl = url('/');
            $donation->cover_photo = $baseUrl . '/storage/' . $request->file('cover_photo')->store('raise-donation-photo');
        }

        $donation->update();

        return redirect('/donasi');
    }

    public function delete_donation($id)
    {
        $donation = Donation::where('id', $id)->first();
        $donor = Donor::where('donation_id', $donation->id)->get();

        Donor::destroy($donor);

        $donation->delete();
        return redirect()->back();
    }
}
