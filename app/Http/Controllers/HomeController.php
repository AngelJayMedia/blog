<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
