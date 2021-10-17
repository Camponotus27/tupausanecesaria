<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigateController extends Controller
{
    public function contactUs(Request $request){
        return view('navigate.contact-us');
    }
}
