<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function DashboardUi()
    {
        return view('admin/index');
    }
    public function PresensiUi()
    {
        $data_presensi = Presensi::where('accepted',0)->skip(0)->take(15)->get();
        session()->put('page',1);
        session()->put('count',15);
        return view('admin.presensi',compact('data_presensi'));
    }
    public function ConfirmAbsen($id)
    {
        $selected = Presensi::find($id);
        $selected->accepted = 1;
        $selected->saveQuietly();
        return redirect()->back();
    }
    public function DeleteAbsen($id)
    {
        $selected = Presensi::find($id);
        $selected->status = 3;
        $selected->saveQuietly();
    }
     public function SubmitAbsen(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,png,pneg,webp',
            
        ]);
        $presensi = new Presensi;
        $imgname = uniqid(). time() . "." . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('presensi'), $imgname);
        $check =  User::where('name',$request->name);
        $presensi->user_id = $check->id;
        $presensi->image = "presensi/".$imgname;
        $presensi->status = $request->status;
        $check->save();
        try{
            $presensi->save();
            return redirect()->back();
        }
        catch(Exception $e)
        {
            return $e;
        }
        
    }
    public function NextPage()
    {
        $cek = session()->get("page");
        $count = session()->get("count");
        
        $count += 15;
        session()->put('page',$cek++);
        session()->put('count',$count);

        $data_presensi = Presensi::where('accepted',0)->skip($count)->take($count+=15)->get();
        return view('admin.presensi',compact('data_presensi'));
    }
    public function BackPage()
    {
        $cek = session()->get("page");
        $count = session()->get("count");
        
        $count -= 15;
        session()->put('page',$cek++);
        session()->put('count',$count);

        $data_presensi = Presensi::where('accepted',0)->skip($count)->take(15)->get();
        return view('admin.presensi',compact('data_presensi'));
    }
}
