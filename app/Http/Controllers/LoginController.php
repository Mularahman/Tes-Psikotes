<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                    return
                    redirect()->intended('/dashboard');
                }
            return
            redirect()->intended('/home');


        }
        return back()->with('error', 'Login Failed!! Em ail Or Password Wrong!!');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return
        redirect('/login');

    }

    public function register()
    {
        return view('admin.auth.register');
    }


    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required'
         ]);

         $data['password']=
         Hash::make($data['password']);


         User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']

         ]);
         $d = $this->validate($request,[

            'email' => 'required|email:dns',
            'password' => 'required'
         ]);
         if(Auth::attempt($d)) {
            $request->session()->regenerate();

            return
            redirect()->intended('/home');


        }
        return back()->with('error', 'Login Failed!! Email Or Password Wrong!!');
    }



}
