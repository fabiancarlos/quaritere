<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    /**
     * index the profile for the given user.
     *
     * @return View
     */
    public function index()
    {
        return view('home.index');
    }
}

