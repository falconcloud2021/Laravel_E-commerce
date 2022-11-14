<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopHomeController extends Controller
{
    public function indexPage()
    {
        return view('shop.index');
    }
}
