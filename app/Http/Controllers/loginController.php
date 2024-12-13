<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\UserCreated;
use Illuminate\Support\Facades\Log;
use App\Models\Cms;

class loginController extends Controller
{

    // login page when first time user comes
    function login()
    {
        if (Auth::check()) {
            return redirect()->route('index.index');
        }
        return view('login');
    }

    // Check login user Validation and redirec to dashboard
    function LoginUsers(Request $req)
    {

        $validator = Validator::make($req->only('email', 'password'),  [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.login')->withErrors($validator)->withInput();
        }


        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::user();

            // Fire the event (Its taking too long time to triger)
            // event(new UserCreated($user));

            if (strtolower($user->userType) === 'admin') {
                return redirect()->route('index.index');
            } else {
                return redirect()->route('index.index');
            }
        } else {
            return  redirect()->route('login.login')->withErrors(['email' => 'Invalid credentials. Please try again.'])->withInput();
        }
    }

    // after login show the Dashboard index page
    function index()
    {
        return view('pages.dashboard');
    }

    // to logout the user
    function logout()
    {
        Auth::logout();
        return redirect()->route('login.login');
    }
}
