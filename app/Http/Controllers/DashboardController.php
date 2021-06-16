<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consultation;
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
        $userId = Auth::id();
        $consultations = Consultation::where('user_id',$userId)->get();
        return view('monprofil',compact('consultations'));
    }
}
