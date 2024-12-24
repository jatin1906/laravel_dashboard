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

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if ($request->has('data')) {
            parse_str($request->input('data'), $data);

            // Validate the parsed data
            $validator = Validator::make($data, [
                'password' => 'required',
                'newpassword' => 'required|min:6',
                'confirmpassword' => 'required|same:newpassword',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors(),
                    'message' => 'Invalid Credentials.',
                ], 422);
            }

            // Now you can access individual values in the array
            if (!empty($data['password']) && !empty($data['newpassword'])) {

                $password = $data['password'] ?? null;
                $newPassword = $data['newpassword'] ?? null;
                $confirmPassword = $data['confirmpassword'] ?? null;

                if (!Hash::check($password, $user->password)) {
                    return $this->sendError('Current Password does not match');
                }

                // If validation passes, update password
                $user->password = Hash::make($newPassword);
                $user->save();
                return $this->sendResponse('Password changed successfully');
            }
        }
    }
}
