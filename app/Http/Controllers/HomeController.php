<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function HomeUi()
    {
        return view('dashboard.index');
    }
    public function PresensiHomeUi()
    {
        return view('dashboard.presensi');
    }
    public function SubmitAbsen(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,pneg,webp',
            
        ]);
        $presensi = new Presensi;
        $imgname = uniqid(). time() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('presensi'), $imgname);
        $presensi->user_id = Auth::id();
        $presensi->image = "presensi/".$imgname;
        $presensi->status = $request->status;

        try{
            $presensi->save();
            return redirect()->back();
        }
        catch(Exception $e)
        {
            return $e;
        }
        
        
    }
    
    
}
