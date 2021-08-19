<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserAuthController extends Controller
{
   public function index(){
       return view('admin.index');
   }
   public function login(){
       return view('auth.login');
   }
   public function register(){
       return view('auth.register');
   }
  
   public function create(Request $request){
       $request->validate([
           'name'=>'required|alpha',
           'email'=>'required|email|unique:users',
           'password'=>'required|min:8|max:8',
       ]);
       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $query = $user->save();

       if($query){
           return back()->with('success','You have been successfully Registerd !');
        }
        else
           {
            return back()->with('fail','Something went wrong !');
           }
    }
    
   public function check(Request $request){
       $request->validate([
           'email'=>'required|email',
           'password'=>'required|min:8|max:8',
       ]);

       $user = User::where('email','=', $request->email)->first();

       if($user){
            if(Hash::check($request->password, $user->password)){
               $request->session()->put('LoggedUser', $user->id);
               return redirect('profile');
            }
             else
                {
                   return back()->with('fail','Invalid password !');
                }
        }
        else
           {
            return back()->with('fail','No account found !');
           }
    }

    public function profile(){
        if(session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
        }

        return view('admin.profile', $data);
    }

    public function logout(){
        session()->forget('LoggedUser');
        return redirect('/');
   }
   
}
