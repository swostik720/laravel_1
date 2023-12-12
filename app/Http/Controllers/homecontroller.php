<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth;

class homecontroller extends Controller
{
    public function index(){
        return view('home');
    } 

    public function login(){
        return view('login');
    }

    public function verify(){
        request()->validate(['email'=>'required|email','password'=>'required']);
        if(auth()->attempt(['email'=> request('email'),'password'=> request('password')])){
            return redirect('home');
        }
        return redirect('login')->withErrors('Wrong email or password!');
    }

    public function register(){
        return view('register');
    }

    public function store(){
        //return request()->all();
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        // return $user; 
        return redirect('login');   
    }

    public function user(){
        $users = User::all();
        return view('users', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        // return $user;
        return view('edit', compact('user'));
    }
    public function update($id){
        request()->validate(['email'=>'required | unique:users,email', 'name' => 'required | min:5']);
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        //return request()->all();
        return redirect('users');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('users');
    }
}