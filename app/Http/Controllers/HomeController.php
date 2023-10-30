<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->user_type;
            if ($usertype == "client") {
                return view("dashboard");
            } else if ($usertype == "admin") {
                return view("admin.admin-home");
            } else {
                return redirect()->back();
            }
        }
    }
    public function post()
    {
        return view("post");
    }
}
