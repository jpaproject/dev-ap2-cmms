<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserTechnical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function formLogin()
    {
        return view('user-technicals.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username_tech' => 'required',
            'password_tech' => 'required'
        ], [
            'username_tech.required' => 'Input username!',
            'password_tech.required' => 'Input Password!'
        ]);

        $username = $request->username_tech;
        $password = $request->password_tech;

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            // User sent their email
            $field = 'email';
        } else {
            // They sent their username instead
            $field = 'username';
        }

        // Attempt authentication
        if (Auth::guard('user-technical')->attempt([$field => $username, 'password' => $password])) {
            // Authentication succeeded, send them to the dashboard
            return redirect()->route('user-technical.dashboard');
        } else {
            // Authentication failed, check for specific errors
            $errors = [];
            $user = User::where($field, $username)->first();
            if (!$user) {
                $errors['username_tech'] = 'Invalid ' . ($field === 'email' ? 'email' : 'username');
            } elseif (!Hash::check($password, $user->password)) {
                $errors['password_tech'] = 'Invalid password';
            }

            return redirect()->back()
                ->withInput($request->only('username_tech'))
                ->withErrors($errors);
        }
    }

    public function logout()
    {
        if (Auth::guard('user-technical')->check()) {
            Auth::guard('user-technical')->logout();
        }

        return redirect()->route('login')->withErrors(['redirect_tech' => 'redirect']);
    }
}
