<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;
use Hash;
use Session;
use Response;

class UserApiController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function loginpage()
    {
        return view('auth.login');
    }

    public function registerpage()
    {
        return view('auth.register');
    }

    public function create_user(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    } 

    public function register(Request $request)
    {
        $validator = validator::make( $request->all(),[
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
                
        $data = $request->all();
        $userr = $this->create_user($data);
 
        if ($userr) {
            if(!$request->is('api/*')){
                Auth::login($userr);
                return redirect("profile")->withSuccess('You have signed-in');
            }
            else{ 
                return response()->json([
                    'status_code'=>200,
                    'message'=>'User created successfully'
                ]);
            }
        }else {
            return response()->json(['error' => 'User Not Created'], 502);
        }
    }

    public function login(Request $request)
    {
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
        if (Auth::attempt($credentials)) {
            $userr = User::where('email',$request->email)->first();
            $tokenResult = $userr->createToken('authToken')->plainTextToken;
            if(!$request->is('api/*')){
                return redirect()->intended('profile')
                ->withSuccess('Signed in');
            }
            else{ 
                return response()->json([
                    'status_code'=>200,
                    'token'=>$tokenResult
                ]);
            }
        }else{
            return response()->json(['error' => 'Unauthorised | Invalid API Key'], 401);
        }
     }

    public function logout() 
    {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }                   

}
