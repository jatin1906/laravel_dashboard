<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Cms;

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
}
