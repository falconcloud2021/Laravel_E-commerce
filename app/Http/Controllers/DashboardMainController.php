<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardMainController extends Controller
{
    public function mainPage()
    {
        return view('dashboard.main');
    }
}
