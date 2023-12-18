<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvocacyController extends Controller
{
    public function index()
    {
        return view('advocacy');
    }
}
