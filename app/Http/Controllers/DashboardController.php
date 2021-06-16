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

    public function create()
    {
        $users =  User::whereRoleIs('medecin')->get();
        return view('consultations.takeconsult',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'motif'        => 'required|string|max:255',
            'confirmation' => 'boolean',
            'user_id'      => 'int',
            'medecin_id'   => 'int',
        ]);
        $userId = Auth::id();

        $consultation = Consultation::create([
            'motif'        => $request->motif,
            'confirmation' => 0,
            'user_id'      => $userId,
            'medecin_id'   => $request->medecin_id,
            
        ]);
       
        return redirect()
            ->back()
            ->with('sucess', 'User updated successfully');
    }

    /*
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

   public function edit($id)
   {
      
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request,$id)
   {
       
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $consultation = Consultation::findOrFail($id);
       $consultation->delete();
       return redirect('/consultation')->with('success', 'Rendez-vous annulé');
   }
}
