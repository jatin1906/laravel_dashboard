<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class sqlController extends Controller
{
    function secondhigestSalary(Request $req)
    {
        $sqlQuery = DB::table('table_salary as t')
            ->selectRaw('count(t.salary) as id , t1.salary')
            ->join('table_salary as t1', 't.salary', '<=', 't1.salary')
            ->groupBy('t1.salary')
            ->havingRaw('count(t1.salary)=?', [$req->number])->get();

        $salUserData = [];
        foreach ($sqlQuery as $key => $val) {
            $salUserData[$val->id] = $val->salary;
        }
        return $salUserData;
    }

    function getUserRecord()
    {
        $user = User::find(1)->salary;
        $user = User::with('salary')->find(1);
        return $user;
    }

    // function exportData()
    // {
    //     $users  = User::all();

    //     // Define the headers for the CSV file
    //     $headers = [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="users.csv"',
    //     ];

    //     // Create a callback to write CSV content
    //     $callback = function () use ($users) {
    //         $file = fopen('php://output', 'w');

    //         // Add CSV column headers
    //         fputcsv($file, ['ID', 'Name', 'Email', 'User Type']);

    //         // Add data rows
    //         foreach ($users as $user) {
    //             fputcsv($file, [$user->id, $user->name, $user->email, $user->userType]);
    //         }

    //         fclose($file);
    //     };

    //     return Response::stream($callback, 200, $headers);
    // }

    function exportData()
    {

        return  Excel::download(new User, 'users.csv');
    }
}
