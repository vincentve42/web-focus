<?php

namespace App\Http\Controllers;

use App\Models\Notif;
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
        $presensi = Auth::user()->presensi->where('accepted',1)->take(10);

        return view('dashboard.presensi', compact('presensi'));
    }
    public function KasHomeUi()
    {
        $kas = Auth::user()->kas;

        return view('dashboard.kas', compact('kas'));
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
        SendNotif(Auth::user(),"Absen","User bernama ".Auth::user()->name." Telah menclick form submit",1);

        try{
            $presensi->save();
            return redirect()->back();
        }
        catch(Exception $e)
        {
            return $e;
        }
        
        
    }
    public function NotifHomeUi(){
        
        
        $notif = Notif::where('user_id',Auth::id())->where('admin',0)->orderBy('id','desc')->get();
        return view('dashboard.notif',compact('notif'));
    }
    
    
    
}
