<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $user=User::where(['email'=>$req->input('email')])->first();
        if($user && Hash::check($req->input('password'),$user->password)){
            $req->session()->put('user',$user);
           return redirect('/');
        }
        else{
            return "user info is not matched!!!";
        }
        
    }
    public function register(Request $req)
    {
        if(Session::has('user')){
            return redirect('/');
        }
        return view('register');
    }
    public function postregister(Request $req)
    {//admin
        $user=new User();
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->save();
        return redirect('/login');
    }
}
