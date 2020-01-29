<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show(){
        return view("loginck.login");
    }
        
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required'
        ]);
        if($validator->fails()){
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('email','=',$request->email)->where('password','=',$request->password)->first();

        if($user != null){
            session()->put('user',$user);
            Auth::login($user);
            return redirect()->home()->with('message','Login successful! Welcome  '.$user->first_name.' '.$user->last_name);
        } else{
            return ('Please check your email or password.');
        }
    }

    public function distroy(){
        Auth::logout();
        return redirect()->home();   
    }
} 