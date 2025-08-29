<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard.crm.index');
    }
    public function analytics()
    {
        return view('admin.dashboard.Analytics.index');
    }
}
