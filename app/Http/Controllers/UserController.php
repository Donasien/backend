<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donor;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $user->photo = $request->photo;
        $user->token = $request->token;
        $user->roles = 'user';

        $user->save();

        $data['email'] = $user->email;
        $data['fullname'] = $user->fullname;
        $data['photo'] = $user->photo;
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
        if ($request->gender) {
            $user->gender = $request->gender;
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
        if ($request->file('photo')) {
            $baseUrl = url('/');

            if ($user->photo && strpos($user->photo, $baseUrl . '/storage/') !== false) {
                $oldPhotoPath = str_replace($baseUrl . '/storage/', '', $user->photo);
                Storage::delete($oldPhotoPath);
            }

            $user->photo = $baseUrl . '/storage/' . $request->file('photo')->store('user-photo');
        }

        $user->update();

        $user->makeHidden(['roles', 'token', 'created_at', 'updated_at']);

        return response()->json([
            'success' => true,
            'message' => 'Update Profile Berhasil',
            'data' => $user
        ]);
    }

    public function login_admin()
    {
        return view('Login.login');
    }

    public function action_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->roles == 'admin') {
                return redirect('/dashboard');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('failed', 'Email atau Password anda salah');
            }
        }
        return back()->with('failed', 'Email atau Password anda salah');
    }
    
    public function logout_admin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard_admin()
    {
        $user = User::where('roles', 'user')->get();
        $donation = Donation::get();
        $donor = Donor::get();

        return view('Dashboard.dashboard', compact('user', 'donation', 'donor'));
    }

    public function data_user()
    {
        $user = User::where('roles', 'user')->get();

        return view('DataUser.index', compact('user'));
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function read_user($id)
    {
        $user = User::where('id', $id)->first();

        return view('DataUser.read', compact('user'));
    }
}
