<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about(Request $request)
    {
        if ($request->header('X-PJAX')) {
            return view('about-content');
        }
        
        return view('about');
    }
}
