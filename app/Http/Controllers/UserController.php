<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function google(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran Atau Login Gagal',
                'data' => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->token = $request->token;
            $user->update();

            $data['email'] = $user->email;
            $data['token'] = $user->token;

            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil',
                'data' => $data
            ]);
        }

        $user = new User();
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->token = $request->token;
        $user->roles = 'user';

        $user->save();

        $data['email'] = $user->email;
        $data['fullname'] = $user->fullname;
        $data['token'] = $user->token;

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Berhasil',
            'data' => $data
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'fullname' => 'required',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Pendaftaran Gagal',
                'data' => $validator->errors()
            ]);
        }

        $user = new User();
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->token = $request->token;
        $user->roles = 'user';

        $user->save();

        $data['email'] = $user->email;
        $data['fullname'] = $user->fullname;
        $data['token'] = $user->token;

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Berhasil',
            'data' => $data
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal',
                'data' => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email Tidak Ditemukan',
                'data' => null
            ]);
        }

        $user->token = $request->token;
        $user->update();

        $data['email'] = $user->email;
        $data['token'] = $user->token;

        return response()->json([
            'success' => true,
            'message' => 'Login Berhasil',
            'data' => $data
        ]);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Logout Gagal',
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

        $user->token = null;
        $user->update();

        $data['email'] = $user->email;
        $data['token'] = $user->token;

        return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil',
            'data' => $data
        ]);
    }

    public function profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Load Profile Gagal',
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

        $user->makeHidden(['roles', 'token', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Load Profile Berhasil',
            'data' => $user
        ]);
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
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

        if ($request->fullname) {
            $user->fullname = $request->fullname;
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->address) {
            $user->address = $request->address;
        }
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        if ($request->kk) {
            $user->kk = $request->kk;
        }
        if ($request->rekening) {
            $user->rekening = $request->rekening;
        }

        $user->update();

        $user->makeHidden(['roles', 'token', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Update Profile Berhasil',
            'data' => $user
        ]);
    }

    public function all_user()
    {
        $user = User::get();

        return response()->json([
            'success' => true,
            'message' => 'All User',
            'data' => $user
        ]);
    }
}
