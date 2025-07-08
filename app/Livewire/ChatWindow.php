<?php

namespace App\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatWindow extends Component
{
    public function render()
    {
        $chat = Chat::get();
        $day = "";
        
        return view('livewire.chat-window',compact('chat','day'));
    }
}
