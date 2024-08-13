<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
        ]);
        // try {
        if (Auth::attempt($credentials)) {

            $id = Auth::user()->id;
            $role = Auth::user()->role;
            session()->put('id', $id);
            session()->put('role', $role);

            if ($role == 'student') {
                return redirect('/student/dashboard');
            } elseif ($role == 'instructor') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/maintenance');
            }
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid login credentials');
        // } catch (Exception $e) {

        //     return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid login credentials');
        // }
    }
    public function Logout()
    {

        // try {
        session()->forget('role');
        session()->forget('id');
        session()->flush();

        return redirect('/');
        // } catch (Exception $e) {

        //     return redirect()->back()->with('error', 'Something went wrong. Please try again');
        // }
    }

    public function Register(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'email' => 'unique:users,email',
            'password' => 'required'
        ], [
            'email.unique' => 'Please Enter a Different Email Address',
            'password.required' => 'Password must be required'
        ]);

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' =>  'student'
            ]);

            // return $user;
            return redirect('/loginPage')->with('message', 'New User Registered Successfully!');
        } catch (Exception $e) {

            // return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
