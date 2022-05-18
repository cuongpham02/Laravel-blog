<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateRegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormRegister()
    {
        return view('admin.auth.register');
    }

    public function register(ValidateRegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $users = User::create($data);
        session(['users' => $users['email']]);
        return redirect('/admin/login')->with('message','Register User Success!');
    }

    public function showFormLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.show-form-login')->with('message', 'Email or password incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.show-form-login');
    }

    public function dashboard()
    {
        return view('admin.auth.dashboard');
    }


    public function profile(Request $request)
    {
        $data = $request->all();
        $user = User::findOrFail(auth()->id);
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }
        $user->update($data);
        return redirect()->back()->with('message', 'Update Profile Success!');
    }
}
