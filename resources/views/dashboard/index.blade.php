<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         @php
    $isProduction = app()->environment('production');
    $manifestPath = $isProduction ? '../focus.vecode.my.id/build/manifest.json' : public_path('build/manifest.json');
 @endphp
 
  @if ($isProduction && file_exists($manifestPath))
   @php
    $manifest = json_decode(file_get_contents($manifestPath), true);
   @endphp
    <link rel="stylesheet" href="{{ config('app.url') }}/build/{{ $manifest['resources/css/app.css']['file'] }}">
    <script type="module" src="{{ config('app.url') }}/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
  @else
    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css'])
  @endif
 
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
                            @if (Auth::user()->admin == 1)
                            <a href="{{ route('DashboardUi') }}"><li class="font-bold pl-5 text-xl text-white">Admin Dashboard</li></a>
                            @endif
                            <a href="{{ route('Logout') }}"><li class="font-bold pl-5 text-xl text-red">Logout</li></a>
                        </ul>
                        <button @click="navbar = !navbar;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 lg:hidden text-black">
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
            <a href="{{ route('HomeUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Home</li></a>
            <a href="{{ route('PresensiHomeUi') }}"><li class="font-bold text-white text-xl pl-1 border-b border-white">Presensi</li></a>
            <a href="{{ route('KasHomeUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Kas</li></a>
            @if (Auth::user()->dokumentasi == 1)
                 <a href="{{ route('ChatUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Chat</li></a>
            @endif
            @if (Auth::user()->admin == 1)
                 <a href="{{ route('DashboardUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Admin Dashboard</li></a>
            @endif
            <a href="{{ route('Logout') }}"><li class="font-bold text-xl text-red pl-1 border-b border-white">Logout</li></a>
            </ul>
       </div>
       </nav>
       <div class="justify-self-center shadow-xl lg:w-128 w-72 lg:h-72 mt-5">
            <div class="flex lg:pt-20 lg:pl-5 pt-5 pl-5 pb-1 pr-5 items-center justify-items-center">
            
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lg:size-24 size-16">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>
            <div>
                <h1 class="font-bold lg:text-xl text-base">{{ Auth::user()->name }}</h1>
            </div>
            
            </div>
            <div class="justify-self-end mr-5">
                <h1 class="font-bold lg:text-xl text-base ">Level {{ Auth::user()->level }}</h1>
            </div>
            @if (Auth::user()->level == 1)
            
            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                <div class="bg-black h-1.5 rounded-full dark:bg-black  "  style="width:50%"></div>
            </div>
            <div class="justify-self-center">
                <h1 class="font-bold lg:text-xl text-base">{{ Auth::user()->xp }}/150</h1>
            </div>

            @elseif (Auth::user()->level == 2)

            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                <div class="bg-black h-1.5 rounded-full dark:bg-black  "  style="width:50%"></div>
            </div>
            <div class="justify-self-center">
                <h1 class="font-bold lg:text-xl text-base">{{ Auth::user()->xp }}/300</h1>
            </div>

             @elseif (Auth::user()->level == 3)

            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                <div class="bg-black h-1.5 rounded-full dark:bg-black  "  style="width:50%"></div>
            </div>
            <div class="justify-self-center">
                <h1 class="font-bold lg:text-xl text-base">{{ Auth::user()->xp }}/400</h1>
            </div>

            @elseif (Auth::user()->level == 4)

            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-4 dark:bg-gray-700">
                <div class="bg-black h-1.5 rounded-full dark:bg-black  "  style="width:50%"></div>
            </div>
            <div class="justify-self-center">
                <h1 class="font-bold lg:text-xl text-base">{{ Auth::user()->xp }}/ 0</h1>
            </div>

            @endif
            
            
       </div>
    </body>
</html>