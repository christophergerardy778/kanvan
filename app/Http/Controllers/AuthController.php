<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register(): \Inertia\Response
    {
        return Inertia::render('Auth/Register', [

        ]);
    }

    public function login(): \Inertia\Response
    {
        return Inertia::render('Auth/Login');
    }
}
