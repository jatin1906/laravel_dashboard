<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cms;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $menus = Cms::where('status', 'A')
            ->where('parent_page_id', '0')
            ->with(['submenus' => function ($query) {
                $query->where('status', 'A');
            }])->get();

        view()->share('menus', $menus);
    }

 
    // Start : Creating a common function to show the response the data in json format
    function sendError($error, $errorMessage = [], $code = 404)
    {
        $response = [
            'status' => false,
            'message' => $error,
        ];

        if (!empty($errorMessage)) {
            $response['data'] = $errorMessage;
        }

        return response()->json($response, $code);
    }

    function sendResponse($message, $res)
    {
        $response = [
            'status' => true,
            'message' => $message,
        ];

        if (!empty($res)) {
            $response['data'] = $res;
        }

        return response()->json($response, 200);
    }
    // End : Creating a common function to show the response the data in json format
}
