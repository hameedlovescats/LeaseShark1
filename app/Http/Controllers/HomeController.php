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
        }else if(Auth::user()->type == 'admin'){
            return redirect()->route('admin.dashboard');
        }else{
            return view('welcome');
        }
    }

}
