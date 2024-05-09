<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalPageController extends Controller
{
    public function personal_page()
    {
        return view('personal_page')->with(['user' => Auth::user()]);
    }
}
