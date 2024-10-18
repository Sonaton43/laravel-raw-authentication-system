<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Hash;
use Auth;
use Str;
use Mail;

class AuthController extends Controller
{
    public function login(){
        // $password = Hash::make('1234');
        // dd($password);
        if (Auth::check()) {
            return redirect()->intended('/dashboard');
        } else {
            // User is logged out
            return view('auth.login');
        }
    }

    public function login_check(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            if(Auth::User()->admin_type ==1 || Auth::User()->admin_type == 0){
                if (!empty(Auth::user()->email_verified_at)) {
                    if (Auth::check()) {
                        return redirect()->intended('/dashboard');
                    } else {
                        // User is logged out
                        return view('auth.login');
                    }
                }else{
                    $user = User::where('email','=', $request->email)->first();

                    Mail::to($user->email)->send(new RegisterMail($user));
                    Auth::logout();
                    return redirect()->back()->with('error',"Please first you can verify your email.");
                }
            }else{
                Auth::logout();
                return redirect()->back()->with('error',"Please Enter Correct Email & Password.");
            }
        }else{
            Auth::logout();
            return redirect()->back()->with('error',"Please Enter Correct Email & Password.");
        }
    }

    public function mail_check($token){
        $user = User::where('remember_token','=',$token)->first();
        if (!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s a', time() - 6*3600);
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect('/')->with('success',"Your Account Successfully Verified.");
        } else {
            abort(404);
        }
    }
    public function forgot(Request $request){
        return view('auth.forgot');
    }

    public function forgot_check(Request $request){
        $user = User::where('email','=',$request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success',"Please Check your email & rest your password.");
           
        } else {
            return redirect()->back()->with('error',"Please Enter Correct Email");
        }
    }

    public function reset($token){
        $user = User::where('remember_token','=',$token)->first();
        if (!empty($user)) {
            $data = $user;
            return view('auth.reset',$data);
        } else {
            abort(404);
        }
    }

    public function reset_password($token, Request $request){
        $user = User::where('remember_token','=',$token)->first();
        if (!empty($user)) {
            if ($request->password == $request->cpassword) {
                $user->password = Hash::make($request->password);
                // if(!empty($user->email_verified_at))
                // {
                //     $user->email_verified_at = date('Y-m-d H:i:s a', time() - 6*3600);
                // }
                $user->remember_token = Str::random(40);
                $user->save();
                return redirect('/')->with('success',"Password Successfully Reset.");
            } else {
                return redirect()->back()->with('error',"Password & Confirm Password Didnot Match.");
            }
            
        } else {
            abort(404);
        }
    }

    public function logout(){
            Auth::logout();
            return redirect('/');
    }

}
