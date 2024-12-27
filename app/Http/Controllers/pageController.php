<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Redirect;

class pageController extends Controller
{
    // Link for table
    function showCms()
    {
        return  view('pages.cms');
    }
    function cmsaddform()
    {
        $selData = Cms::where('parent_page_id', '=', '0')->get();
        return view('pages.cms-add', compact('selData'));
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

    function addCmsData(Request $request)
    {
        $validator = Validator::make($request->only('page_sort', 'page_title'), [
            'page_title' => 'required',
            'page_sort' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Invalid Credentials.',
            ], 422);
        }

        try {
            $input = $request->all();

            $input['parent_page_id'] = sanatizeData($input['parent_page']);
            $input['page_title'] = sanatizeData($input['page_title']);
            $input['page_url'] = sanatizeData($input['page_url']);
            $input['page_sort'] = sanatizeData($input['page_sort']);
            $input['menu_icon'] = sanatizeData($input['menu_icon']);

            $data = Cms::create($input);
            return redirect()->back()->with('success', 'Data saved successfully.');
        } catch (Exception $e) {
            return $this->sendError('Error', $e);
        }
    }
}
