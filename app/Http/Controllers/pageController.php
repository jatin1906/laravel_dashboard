<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class pageController extends Controller
{
    // Link for table
    function showCms()
    {
        return  view('pages.cms');
    }
    function cmsaddform()
    {
        return view('pages.cms-add');
    }
    function profile()
    {
        return view('pages.users-profile');
    }
    function changePassword(request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword'
        ]);
        // Log::info("password Match ");


        if ($validator->fails()) {
            return redirect()->route('users.profile')->withErrors($validator)->withInput();
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            // Log::info('password Match');
            // return 'Password Match';
        } else {
            // Log::info('password not Match');
            return 'Password did\'nt match.';
        }
        // $data[] = Hash::make('newPassword');
        // $Update = User::createupdate();
    }
}
