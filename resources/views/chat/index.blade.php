<html>
    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            @vite('./resources/css/app.css')
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>
        <a href="{{ route('HomeUi') }}"><h1 class="lg:justify-self-start justify-self-center font-bold pb-5 lg:ml-5 lg:text-2xl">Room Dokumentasi</h1></a>
        <div class="lg:w-450 shadow-xl ml-10 mr-10 w-82 ">
            <div class="overflow-auto h-128 lg:h-200">
             @livewire('chat-window')
            </div>
             <form action="{{ route('SendMessage') }}" method="post" class="justify-self-center bg-blue-100 w-full">
                @csrf
                <div class="pt-2 mt-5 pb-2 lg:justify-self-center">
                    <div class="flex items-center justify-items-center">
                <input type="text" placeholder="Chat disini" name="isi" class="p-1 lg:p-3  bg-white justify-self-center rounded-2xl focus:rounded-2xl  w-70 lg:w-150 ml-5 mt-2 ">
                <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pl-5 size-6 lg:size-12 text-green-500   ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
</svg></button>

                </div>
                </div>
             </form>
             <div>
               
             </div>
        </div>
        
    </body>
</html>