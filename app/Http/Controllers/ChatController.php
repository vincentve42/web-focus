<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function ChatUi()
    {
        return view('chat/index');
    }
    public function SendMessage(Request $request)
    {
       
        $new_chat = new Chat;
        $new_chat->isi = $request->isi;
        $new_chat->user()->associate(Auth::user());
        $new_chat->save();
        

        return redirect()->back();
    }
}
