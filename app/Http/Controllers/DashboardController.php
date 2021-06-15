<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
            return view('userdashboard');

        }elseif(Auth::user()->hasRole('medecin')){
            return view('medecindashboard');
        }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
        }
    }

    public function monprofil(){
        return view('monprofil');
    }
}
