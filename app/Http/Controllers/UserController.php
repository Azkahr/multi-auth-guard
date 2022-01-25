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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
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
}
