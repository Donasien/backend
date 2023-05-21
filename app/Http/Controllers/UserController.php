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
        $user->save();

        $data['email'] = $user->email;
        $data['token'] = $user->token;

        return response()->json([
            'success' => true,
            'message' => 'Logout Berhasil',
            'data' => $data
        ]);
    }
}
