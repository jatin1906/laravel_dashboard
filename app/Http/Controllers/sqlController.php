<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
}
