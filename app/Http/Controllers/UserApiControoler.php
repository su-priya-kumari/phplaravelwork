<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\user;
use Auth;

class UserApiControoler extends Controller
{
    public function register(Request $request){
        $validator = validator::make($request->all(),[
            'name'=>'required|alpha',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:8',
        ]);
        if($validator->fails()){
            return response()->json([
                'status_code'=>400,
                'message'=>'Bad Response'
            ]);
         }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $query = $user->save();
 
        return response()->json([
            'status_code)'=>200,
            'message'=>'User created successfully'
        ]);
    }

    public function login(Request $request){
        $validator = validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status_code'=>400,
                'message'=>'Bad Response'
            ]);
         }
        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status_code'=>500,
                'message'=>'Unauthorized'
            ]);
        }
        $user = User::where('email',$request->email)->first();
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'status_code'=>200,
            'token'=>$tokenResult
        ]);
     }

     public function logout(Request $request)
     {
         $request->user()->currentAccessToken()->delete();
         return response()->json([
            'status_code'=>200,
            'token'=>'Token Deleted'
        ]);
     }

}
