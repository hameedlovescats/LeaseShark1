<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->type == 'user' ){
            return view('welcome');
        }else{
            return view('admin.dashboard');
        }
    }
    public function page()
    {
        return view('adminpage');
    }
}
