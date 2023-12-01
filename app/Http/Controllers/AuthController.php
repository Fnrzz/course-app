<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 1) {
                return redirect()->route('adminDashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Email dan Password mungkin salah',
        ])->onlyInput('email');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:dns|unique:users|regex:/^[a-zA-z0-9_.+-]+@gmail.com$/i',
            'password' => 'required',
            'number_phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required'
        ]);

        $password = bcrypt($request->password);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'role' => 2,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth
        ]);

        return redirect()->route('login');
    }

    public function userEdit($id,Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:dns|regex:/^[a-zA-z0-9_.+-]+@gmail.com$/i',
            'number_phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
        ]);

        $user = User::where('id',$id)->first();

        if($request->image)
        {
            $request->validate([
                'image' => 'image'
            ]);

            if (!$user->image) {
                $name = $request->image->hashName();
                $request->image->storeAs('ImageCardUser', $name);
                $user->update([
                    'image' => $name
                ]);
            }else{
                Storage::delete('ImageCardUser/' . $user->image);
                $name = $request->image->hashName();
                $request->image->storeAs('ImageCardUser', $name);
                $user->update([
                    'image' => $name
                ]);
            }
        }
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);
        
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
