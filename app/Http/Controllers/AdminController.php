<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
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
        $image_to_delete = public_path($selected->image);
        if(file_exists($image_to_delete))
        {
            unlink($image_to_delete);
        }
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
    public function NextPage($panel)
    {
        $cek = session()->get("page");
        $count = session()->get("count");
        
        $count += 15;
        session()->put('page',$cek++);
        session()->put('count',$count);

        $data_presensi = Presensi::where('accepted',0)->skip($count)->take($count+=15)->get();
        if($panel == 1)
        {
            return view('admin.presensi',compact('data_presensi'));
        }
    }
    public function BackPage($panel)
    {
        $cek = session()->get("page");
        $count = session()->get("count");
        
        $count -= 15;
        session()->put('page',$cek++);
        session()->put('count',$count);

        $data_presensi = Presensi::where('accepted',0)->skip($count)->take(15)->get();
        if($panel == 1)
        {
            return view('admin.presensi',compact('data_presensi'));
        }
        
    }
    // Keuangan
    public function LaporanKeuanganUI()
    {
        $data_keuangan = Pengeluaran::take(15)->get();
        session()->put('page',1);
        session()->put('count',15);
        return view('admin.laporan-keuangan',compact('data_keuangan'));
    }
    public function EditLaporanKeuanganUi($id)
    {
        $data_keuangan = Pengeluaran::find($id);
        return view('admin.edit-laporan-keuangan',compact('data_keuangan'));
        
    }
    public function DeleteLaporanKeuangan($id)
    {
        $selected = Pengeluaran::find($id)->first();

        $image_to_delete = public_path("nota/".$selected->image);
        if(file_exists($image_to_delete))
        {
            unlink($image_to_delete);
        }
        $selected->delete();
        
        return redirect()->back();
    }
    public function AddKeuangan(Request $request)
    {
        $request->validate(
            ['image' => 'required|mimes:jpg,png,jpeg,jfif']
        );
        try
        {
            $new_laporan_keuangan = new Pengeluaran;
            $new_laporan_keuangan->keterangan_1 = $request->name;
            $new_laporan_keuangan->keterangan_2 = $request->name_2;
            if($request->name_2 == "")
            {
                $new_laporan_keuangan->keterangan_2 = "";
            }
            $new_laporan_keuangan->debit = $request->debit;
            $new_laporan_keuangan->kredit = $request->kredit;
            $imgname = uniqid(). time() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path("nota"), $imgname);
            $new_laporan_keuangan->image = $imgname;
            $new_laporan_keuangan->save();
            return redirect()->back();
        }
        
        catch(Exception $e)
        {
            return $e;
        }
    }
    
}
