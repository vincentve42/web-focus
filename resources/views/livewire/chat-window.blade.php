<div wire:poll.1s class="">
    @foreach ($chat as $single_chat)
        @if($day != $single_chat->created_at->format('d M'))
            <p class="justify-self-center">{{$single_chat->created_at->format('d M')}}</p>
            @php
                $day = $single_chat->created_at->format('d M');

            @endphp
        @else

        @endif
        @if($single_chat->user_id == Auth::user()->id)
            <div class=" bg-blue-500 justify-self-end rounded-2xl pt-1 pl-3 pr-3 mr-3 mt-5">
           
            <p class="justify-self-end text-xs text-white">You</p>
            <p class="justify-self-end text-white">{{ $single_chat->isi }}</p>
            <p class="justify-self-end text-xs text-white">{{$single_chat->created_at->format('H:m')}}</p>
            </div>
        @else
        
            <div class=" bg-blue-300 justify-self-start ml-5 rounded-2xl pt-1 pl-3 pr-3 mr-3 mt-5">
           
            <p class="justify-self-start text-xs text-white">{{ Username($single_chat->user_id) }}</p>
            <p class="justify-self-start text-white">{{ $single_chat->isi }}</p>
            <p class="justify-self-start text-xs text-white">{{$single_chat->created_at->format('H:m')}}</p>
            </div>
        @endif

    @endforeach
</div>
