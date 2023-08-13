<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about(Request $request)
    {
        $users = User::latest()->get();
        if ($request->header('X-PJAX')) {
            return view('about-content', compact('users'));
        }
        
        return view('about', compact('users'));
    }
}
