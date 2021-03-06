<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        //validasi
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ],[
            'cpassword.same' => 'The confirm password and password must match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        if($validatedData){
            return redirect()->back()->with('success', 'Register successfully');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong, failed to register');
        }

        // return redirect()->with('success', 'Registration successfully!');
    }

    public function check(Request $request){
        //validasi input
        $request->validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists, you are not registered' 
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('user.home')->with('success', 'Login sucessfully');
        } else {
            return redirect()->route('user.login')->with('fail', 'Wrong email or password');
        }
    }

    public function logout(){
        
        Auth::guard('web')->logout();
        
        return redirect('/');
    }
}
