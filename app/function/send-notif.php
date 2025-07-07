<?php

use App\Models\Notif;


function SendNotif($user, $judul, $isi, $isadmin)
{
    $notif = new Notif;
    $notif->judul = $judul;
    $notif->isi = $isi;
    $notif->user()->associate($user);
    if($isadmin == 0)
    {
        $notif->admin = 0;
    }
    if($isadmin == 1)
    {
        $notif->admin = 1;
    }
    $notif->save();
}

?>