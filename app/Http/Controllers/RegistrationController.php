<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use App\User;

class RegistrationController extends Controller
{
    public function index(){   
        $data=User::all();
        return view("home",compact('data'));
    }
    
    public function create(){   
        return view("registration.create");
    }

    public function store(Request $request){   
        //validation form data
        $this->validate(request(),[
                       
            'first_name'=>'required' ,
            'last_name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed' ]);
        
        //check if database is empty
        $orders = User::all();

        if($orders->isEmpty()){
            
            $file=$request->file("image");
            
            if($request->hasFile("image")){ 
                $file->move("image/",$file->getClientOriginalName());
            }
        
            $obj= new User;
            $obj->first_name=$request->first_name;
            $obj->last_name=$request->last_name;
            $obj->email=$request->email;
            $obj->password=$request->password;
            $obj->mobile_number=$request->mobile_number;
            $obj->uploadFile=$file->getClientOriginalName();
            $obj->role='1';
            $obj->save();
        }
        else{
            $file=$request->file("image");
            
            if($request->hasFile("image")){ 
                $file->move("image/",$file->getClientOriginalName());
            }
            
            $obj= new User;
            $obj->first_name=$request->first_name;
            $obj->last_name=$request->last_name;
            $obj->email=$request->email;
            $obj->password=$request->password;
            $obj->mobile_number=$request->mobile_number;
            $obj->uploadFile=$file->getClientOriginalName();
        
            $obj->save();
        }
        
        //user login
        Auth::login($obj);
        return redirect()->home();
    }
             
    public function edit($id){
        $user = User::find($id);
        return view ("registration.edit_user",compact('user'));
    }
    
   public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $vall=$file=$request->file("image");
            if($vall==0)

            {
                 $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;
                $user->update();
       
            }
        else{
            $file=$request->file("image");
        if($request->hasFile("image"))
        { 
            $file->move("image/",$file->getClientOriginalName());
            }
        

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile_number = $request->mobile_number;
        $user->email = $request->email;
        $user->uploadFile=$file->getClientOriginalName();
        $user->update();
        }
        return redirect()->home();
    }
    
}