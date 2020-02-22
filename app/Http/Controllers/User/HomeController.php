<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function index(){
        return view('user/home');
    }
    
    public function show(){
        return view('user/product/detail');
    }

    public function profile(){
        return view('user/profile/profile');
    }
}
