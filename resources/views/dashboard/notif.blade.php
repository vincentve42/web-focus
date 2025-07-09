<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         @vite('./resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
         
    </head>
    <body x-data="{navbar : false}">
       <nav class="bg-indigo-500 ">
            <div class="flex justify-between">
                <div class="text-white">
                    <div class="p-6">
                        <ul class="lg:flex hidden">
                            <a href="{{ route('HomeUi') }}"><li class="font-bold text-xl text-white">Home</li></a>
                            <a href="{{ route('PresensiHomeUi') }}"><li class="font-bold pl-5 text-xl text-white">Presensi</li></a>
                            <a href="{{ route('KasHomeUi') }}"><li class="font-bold pl-5 text-xl text-white">Kas</li></a>
                            @if (Auth::user()->dokumentasi == 1)
                            <a href="{{ route('ChatUi') }}"><li class="font-bold pl-5 text-xl text-white">Room Dokum</li></a>
                            @endif
                        </ul>
                        <button @click="navbar = !navbar;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 lg:hidden text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg></button>
                    </div>
                    
                </div>
            
            <div class="p-5"><a href="{{ route('NotifHomeUi') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg></a>

            </div>
        </div>
        <div x-show="navbar" class="lg:hidden bg-indigo-500">
        <ul>
            <a href="{{ route('HomeUi') }}"><li class="font-bold text-xl pl-1 border-b text-white border-white">Home</li></a>
            <a href="{{ route('PresensiHomeUi') }}"><li class="font-bold text-xl pl-1 border-b text-white border-white">Presensi</li></a>
            <a href="{{ route('KasHomeUi') }}"><li class="font-bold text-xl pl-1 border-b text-white border-white">Kas</li></a>
            @if (Auth::user()->dokumentasi == 1)
                 <a href="{{ route('ChatUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Chat</li></a>
            @endif
            </ul>
       </div>
       </nav>
    <div id="notif"  class="lg:w-450 lg:ml-10 lg:h-200 h-130 lg:mt-10 lg:mr-10 ml-5 mt-5 mr-5 shadow-2xl overflow-auto">
        
        <h1 class="font-bold lg:text-2xl text-xl lg:ml-5 ml-8 pt-3 pb-3">Notifikasi</h1>
        <div class="mt-2 lg:mt-5 ml-5">
        @foreach ($notif as $single_data)
        <div class="flex justify-start items-center justify-items-center">
            
           @if ($single_data->judul == "Naik Level")
           <div class="bg-green-100 rounded-full">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 text-green-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
</svg>
            @elseif ($single_data->judul == "Absen Diterima")
            <div class="bg-green-100 rounded-full">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 text-green-500">
   <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
</svg>
@elseif ($single_data->judul == "Absen Ditolak")
            <div class="bg-red-100 rounded-full">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 text-red-500">
   <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
@elseif ($single_data->judul == "Mendapatkan Poin")
            <div class="bg-blue-100 rounded-full">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 text-blue-500">
   <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
@elseif ($single_data->judul == "Undangan Dokumentasi")
            <div class="bg-blue-100 rounded-full">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 text-blue-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
</svg>


           @endif
           </div>
           <div class="ml-2">
            <p>{{ $single_data->judul }}</p>
          </div>
        </div>
        <p class="text-xs ml-14 pt-0"> {{ $single_data->isi }}</p>
        <p class="text-xs ml-14 pt-0"> - Admin</p>
        @endforeach 
</div>
    </div>
    </body>
</html>