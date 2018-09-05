<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
    	return view('user.index');
    }
    public function page() {
    	return view('portal');
    }

    public function help()
    {
    	return view('user.about');
    }
}
