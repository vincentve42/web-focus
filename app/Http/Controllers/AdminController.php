<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Notif;
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
        $data_presensi = Presensi::where('accepted',0)->skip(0)->take(20)->get();
        session()->put('page',1);
        session()->put('count',20);
        return view('admin.presensi',compact('data_presensi'));
    }
    public function ConfirmAbsen($id)
    {
        $selected = Presensi::find($id);
        $selected->accepted = 1;
        $selected->saveQuietly();
        $data = $selected->user;
        $judul = "Naik Level";
        $isi = "Absen anda diterima, silahkan hubungi pengurus jika ada kesalahan";
        SendNotif($data, $judul, $isi, 0);
        return redirect()->back();
    }
    public function DeleteAbsen($id)
    {
        $selected = Presensi::find($id);
        $data = $selected->user;
        $selected->status = 3;
        $image_to_delete = public_path($selected->image);
        if(file_exists($image_to_delete))
        {
            unlink($image_to_delete);
        }
        // Notifikasi
         
        $judul = "Naik Level";
        $isi = "Absen anda ditolak, silahkan hubungi pengurus jika ada kesalahan";
        SendNotif($data, $judul, $isi, 0);
        //
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
        $count += 20;
        
        session()->put('page',$cek++);
        session()->put('count',$count);

        
        if($panel == 1)
        {
            $data_presensi = Presensi::where('accepted',0)->skip($count)->take(20)->get();
            return view('admin.presensi',compact('data_presensi'));
            //return $count;
        }
        if($panel == 2)
        {
            $data_keuangan = Pengeluaran::skip($count)->take(20)->get();
            return view('admin.laporan-keuangan',compact('data_keuangan'));
            //return $count;
        }
        if($panel == 3)
        {
            $data_user = User::skip($count)->take(20)->get();
            return view('admin.invite-dokum',compact('data_user'));
            // fOR Debugging
            //return $count;
        }
        if($panel == 4)
        {
            $data_user = User::skip($count)->take(20)->get();
            return view('admin.user-kas',compact('data_user'));
            // fOR Debugging
            //return $count;
        }
        
    }
    public function BackPage($panel)
    {
        $cek = session()->get("page");
        $count = session()->get("count");
        
        
        $count -= 20;
        session()->put('page',$cek--);
        session()->put('count',$count);

        if($cek == 1)
        {
            return redirect()->back();
        }
        if($panel == 1)
        {
            $data_presensi = Presensi::where('accepted',0)->skip($count)->take(20)->get();
            return view('admin.presensi',compact('data_presensi'));
        }
        if($panel == 2)
        {
            $data_presensi = Pengeluaran::skip($count)->take(20)->get();
            return view('admin.laporan-keuangan',compact('data_presensi'));
        }
        if($panel == 3)
        {
            $data_user = User::skip($count)->take(20)->get();
            return view('admin.invite-dokum',compact('data_user'));
        }
        if($panel == 4)
        {
            $data_user = User::skip($count)->take(20)->get();
            return view('admin.user-kas',compact('data_user'));
            // fOR Debugging
            //return $count;
        }
        
        
    }
    // Laporan Keuangan
    public function LaporanKeuanganUI()
    {
        $data_keuangan = Pengeluaran::take(20)->get();
        session()->put('page',1);
        session()->put('count',20);
        return view('admin.laporan-keuangan',compact('data_keuangan'));
    }
    public function EditLaporanKeuanganUi($id)
    {
        $data_keuangan = Pengeluaran::find($id);
        return view('admin.edit-laporan-keuangan',compact('data_keuangan'));
        
    }
    public function EditLaporanKeuangan($id,Request $request)
    {
       $data_keuangan = Pengeluaran::find($request->id);
       $data_keuangan->keterangan_1 = $request->name;
       $data_keuangan->keterangan_2 = $request->name_2;
       $data_keuangan->debit = $request->debit;
       $data_keuangan->kredit = $request->kredit;
       $data_keuangan->image = $request->image;

       try
       {
            $data_keuangan->save();
       }
       catch(Exception $e)
       {
            return $e;
       }
       return view('admin.edit-laporan-keuangan', compact('data_keuangan'));
        
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
        try
        {
            
            $new_laporan_keuangan->save();
            return redirect()->back();
        }
        
        catch(Exception $e)
        {
            return $e;
        }
        
    }
    // Reward Dokum
    public function InviteDokumUi()
    {
        $data_user = User::take(20)->get();
        session()->put('page',1);
        session()->put('count',20);
        return view('admin.invite-dokum',compact('data_user'));
    }
    public function InviteDokum($id)
    {
        $data_user = User::find($id);
        if($data_user->dokumentasi == 1)
        {
            $data_user->dokumentasi = 0;
            $data_user->save();
        } 
        else
        {
            $data_user->dokumentasi = 1;
            $data_user->save();
        }
        return redirect()->back();
    }
    public function RewardUser(Request $request)
    {
        
        
        $cek = User::where('name',$request->name)->count();
        if($cek > 0)
        {
            $data = User::where('name',$request->name)->first();
            $data->dokumentasi = 0;
            $data->xp += $request->xp;
            try
             {
                $judul = "Mendapatkan Poin";
                $isi = "Anda telah mendapatkan sebanyak ".$request->xp." Poin dari hasil dokumentasi anda";
                SendNotif($data, $judul, $isi, 0);
            }
            catch(Exception $e)
            {
                return $e;
            }

            // Cek Level

            if($data->level == 1)
            {
                if($data->xp >= 200)
                {
                    $data->level = 2;
                    $judul = "Naik Level";
                    $isi = "Anda berhasil naik ke level 2!";
                    SendNotif($data, $judul, $isi, 0);
                }
            }
            if($data->level == 2)
            {
                if($data->xp >= 300)
                {
                    $data->level = 3;
                    $judul = "Naik Level";
                    $isi = "Anda berhasil naik ke level 3!";
                    SendNotif($data, $judul, $isi, 0);
                }
            }
            if($data->level == 3)
            {
                if($data->xp >= 400)
                {
                    $data->level = 4;
                    $judul = "Naik Level";
                    $isi = "Anda berhasil naik ke level 3!";
                    SendNotif($data, $judul, $isi, 0);
               
                }

                
            }
            $data->save();
            return redirect()->back();

        }
        else
        {
            return redirect()->back()->withErrors('User Tidak Ditemukan');
        }       
    }
    public function ShowUserKasUi()
    {
        $data_user = User::take(20)->get();
        
        session()->put('page',1);
        session()->put('count',20);
        return view('admin.user-kas',compact('data_user'));
    }
    public function ShowKasUser($id)
    {
        $user = User::find($id)->first();
        $data_user = $user->kas;

       // return dd($data_user);

        //return dd($data_user);
         return view('admin.kas',compact('user','data_user'));
    }
    public function EditKasUser($id,Request $request)
    {
        $data_yg_edit = Kas::where('user_id',$id)->where('bulan', $request->month)->first();
        $data_yg_edit->total = $request->amount;
        $data_yg_edit->bayar = 2;
       
        $data_yg_edit->save();
    }
    public function Search($panel, Request $request)
    {
        if($panel == 1)
        {
            $data_gg = User::where('name', $request->search)->first();
            $data_presensi = Presensi::where('user_id',$data_gg->id)->get();
            //return dd($data_presensi);
            return view('admin.presensi',compact('data_presensi'));
            //return $count;
        }
        if($panel == 2)
        {
            $data_keuangan = Pengeluaran::where('keterangan_1',$request->search)->get();
            return view('admin.laporan-keuangan',compact('data_keuangan'));
            //return $count;
        }
        if($panel == 3)
        {
            $data_user = User::where('name',$request->search)->get();
            return view('admin.invite-dokum',compact('data_user'));
            // fOR Debugging
            //return $count;
        }
        if($panel == 4)
        {
            $data_user = User::where('name',$request->search)->get();
            return view('admin.user-kas',compact('data_user'));
            // fOR Debugging
            //return $count;
        }
        
    }
}
