<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function create(Request $request){
        // validasi inputs
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email',
            'hospital' => 'required',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ],[
            'cpassword.same' => 'The confirm password and password must match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        Doctor::create($validatedData);

        if($validatedData){
            return redirect()->back()->with('success', 'Registered successfully');
        } else {
            return redirect()->back()->with('fail', 'Register failed');
        }
    }

    public function check(Request $request){
        // validasi input
        $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:5|max:30'
        ],[
            'email.exists' => 'This email is not exist, you are not registered'
        ]);
        
        $creds = $request->only('email', 'password');

        if(Auth::guard('doctor')->attempt($creds)){
            return redirect()->route('doctor.home')->with('success', 'Login successfully');
        } else {
            return redirect()->route('doctor.login')->with('fail', 'Wrong email or password');
        }
    }

    public function logout(){

        Auth::guard('doctor')->logout();
        
        return redirect('/');
    }
}
