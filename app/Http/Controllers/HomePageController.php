<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function home_page()
    {
        return view('home_page');
    }
}
