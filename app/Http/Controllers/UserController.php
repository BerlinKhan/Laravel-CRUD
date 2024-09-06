<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
      $data = $request->validate([
        "name"=> ["required","min:3", "max:20", Rule::unique("users","name")],
        "email"=> ["required","email",Rule::unique("users","email")],
        "password"=> ["required","min:3","max:100"],
      ]);
      $data["password"]= bcrypt($data["password"]);
      
      $user=User::create($data);
      auth()->login($user);

        return redirect("/");
    }

    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function login(Request $request){
        $data= $request->validate([
            'loginname'=>'required',
            'loginpassword'=>"required"
        ]);
    
        if(auth()->attempt(['name'=>$data['loginname'], 'password'=>$data["loginpassword"]]))
        {
            $request->session()->regenerate();
        };
        return redirect("/");
    }
}
