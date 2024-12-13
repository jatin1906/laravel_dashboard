<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\Http\Controllers\Controller as Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{

    function addUser(Request $req)
    {

        $validator  = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'userType' => 'required'
        ]);

        if ($validator->fails($validator)) {
            return $this->sendError('Validation for', $validator->errors());
        }


        try {
            // Step 2: Preprocess input
            $input = $req->all();
            $input['name'] = strtolower($input['name']); // Convert name to lowercase
            $input['email'] = strtolower($input['email']); // Convert email to lowercase
            $input['userType'] = strtolower($input['userType']); // Convert userType to lowercase
            $input['password'] = bcrypt($input['password']); // Hash password

            $user = User::create($input);
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user['name'];

            return $this->sendResponse('Data save Successfully', $success);
        } catch (Exception $e) {

            return $this->sendError('Error', $e);
        }
    }

    function login(Request $req)
    {
        // date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        // $log = [
        //     'Date' => date('Y-m-d H:i:s'),
        //     'Url' => $req->getUri(),
        //     'Method' => $req->getMethod(),
        //     'Response' => $req->all()
        // ];
        // return $log;
        // return $req->getUri();
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $user = Auth::user();
            // $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user['name'];
            return $this->sendResponse('Login Successfully', $success);
        } else {

            return $this->sendError('Unauthorised', ['error' => 'Invalid user']);
        }
    }

    function getallUser()
    {
        $user  = User::paginate(5);
        return $this->sendResponse('Totol Record ' . user::count(), $user);
    }
}
