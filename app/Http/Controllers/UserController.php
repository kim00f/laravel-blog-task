<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $inFields= $request->validate([
    'name' => 'required|string|max:100',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:4'
]);
    $inFields['password']=bcrypt($inFields['password']);
    $user=User ::create($inFields);
    auth()->login($user);


       return redirect('/');
    }
    public function logout(Request $request){
        auth()->logout();
        return redirect('/');
}
    public function login(Request $request){
        $infields= $request->validate([
            'logemail'=>'required',
            'logpassword'=> 'required'
        ]);
        if(auth()->attempt(['email'=> $infields['logemail'],'password'=>$infields['logpassword']])){
            $request->session()->regenerate();

        }

        return redirect('/');
}
}
