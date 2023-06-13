<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BloodDonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloodDonorController extends Controller
{
    public function all_blood(Request $request)
    {
        $already_submit = null;

        if ($request->token) {
            $user = User::where('token', $request->token)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Token Tidak Ditemukan',
                    'data' => null
                ]);
            }

            if ($user->blooddonor->isNotEmpty()) {
                $already_submit = true;
            }else{
                $already_submit = false;
            }
        }

        $blooddonor = BloodDonor::with('user')->get();

        foreach ($blooddonor as $item) {
            $item->makeHidden(['user_id', 'created_at', 'updated_at']);
            $item->user->makeHidden(['roles', 'bank', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Load Semua Donor Darah Berhasil',
            'data' => $blooddonor,
            'already_submit' => $already_submit,
        ]);
    }

    public function submit_blood(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'blood_type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Submit Donor Darah Gagal',
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

        $blooddonor = new BloodDonor();
        $blooddonor->user_id = $user->id;
        $blooddonor->blood_type = $request->blood_type;

        $blooddonor->save();

        $user->makeHidden(['roles', 'bank', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Submit Donor Darah Berhasil',
            'data' => $blooddonor,
            'user' => $user,
        ]);
    }

    public function delete_blood(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Hapus Donor Darah Gagal',
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

        $blooddonor = BlooDdonor::where('user_id', $user->id)->first();

        if (!$blooddonor) {
            return response()->json([
                'success' => false,
                'message' => 'Id Donor Darah Tidak Ditemukan',
                'data' => null
            ]);
        }
        
        $blooddonor->delete();

        $user->makeHidden(['roles', 'bank', 'token', 'kk', 'rekening', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Hapus Donor Darah Berhasil',
            'user' => $user,
        ]);
    }
}
