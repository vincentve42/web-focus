<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AutentikasiController extends Controller
{
    
    public function RegisterUi()
    {
        return view('autentikasi.register');
    }
    public function LoginUi()
    {
        return view('autentikasi.login');
    }
    public function Register(Request $request)
    {
        $request->validate([
            'name' => "required|unique:users",
            'email' => "required|unique:users",
            'password' => "required|min:8",

        ]);
        $newuser = new User;
        $newuser->name = $request->name;
        $newuser->email = $request->email;
        $newuser->password = $request->password;

        

        // create kas
        
        try
        {
            $newuser->save();
            for($i=1; $i<12; $i++)
            {
                $kas = new Kas;
                $kas->bulan = $i;
                $kas->user()->associate($newuser);
                $kas->save();

            }
            return redirect()->route('LoginUi');
        }
        catch(Exception $e)
        {
            return $e;
        }
        
    }
    public function Login(Request $request)
    {
        $cek = $request->only('name','password');
        try
        {
            if(Auth::attempt($cek))
            {
                $request->session()->regenerate();
                return "Anda Berhasil Login";
            }
            else
            {
                return "Gagal Login";
            }
        }
        catch(Exception $e)
        {
            return $e;
        }
        
    }
}
