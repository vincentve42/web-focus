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
            <a href="{{ route('PresensiHomeUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Presensi</li></a>
            <a href="{{ route('KasHomeUi') }}"><li class="font-bold text-xl pl-1 text-white border-b border-white">Kas</li></a>
            @if (Auth::user()->dokumentasi == 1)
                 <a href="{{ route('ChatUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Roomchat Dokumentasi</li></a>
            @endif
            @if (Auth::user()->admin == 1)
                 <a href="{{ route('DashboardUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Admin Dashboard</li></a>
            @endif
            <a href="{{ route('Logout') }}"><li class="font-bold text-xl text-red pl-1 border-b border-white">Logout</li></a>
            </ul>
       </div>
       </nav>
    <div class="lg:flex lg:justify-start lg:h-200 ">
        <div class="lg:shadow-xl lg:mt-10 lg:mr-10 lg:ml-10 lg:w-full">
            <h1 class="lg:text-2xl lg:w-8xl lg:text-center lg:font-bold lg:p-3 text-center font-bold text-xl mt-10">Riwayat Kas Anda</h1>
            <table class="lg:mt-10 mt-5  justify-self-center">
                <tr class="border-b border-gray-300">
                    <th class="p-3 lg:p-3">ID</th><th class="p-3 lg:p-3">Bulan</th><th class="p-3 lg:p-3">Total</th><th class="p-3 lg:p-3">Status</th>
                </tr>
                @foreach ($kas as $single_data )
                <tr class="border-b border-gray-200">
                        <td class="lg:p-2 p-1 text-center">{{ $single_data->id }}</td>
                        <td class="lg:p-2 p-1 text-center">{{ CheckMonth($single_data->bulan)}}</td>
                        <td class="lg:p-2 p-1">Rp.{{ number_format($single_data->total,2,',','.')}}</td>
                        

                        @if ($single_data->bayar == 0)
                            <td class="lg:p-2 p-1 text-blue-500">Belum Di Set Pengurus</td>
                        @elseif($single_data->bayar == 2)
                            <td class="lg:p-2 p-1 text-red-500">Belum Dibayar</td>
                        @elseif($single_data->bayar == 1)
                            <td class="lg:p-2 p-1 text-green-500">Telah Dibayar</td>
                        @endif
                        
                </tr>
                @endforeach
            </table>
        </div>
        
    </div>
    </body>
</html>