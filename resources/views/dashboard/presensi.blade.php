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
            <a href="{{ route('HomeUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Home</li></a>
            <a href="{{ route('PresensiHomeUi') }}"><li class="font-bold text-white text-xl pl-1 border-b border-white">Presensi</li></a>
            <a href="{{ route('KasHomeUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Kas</li></a>
            @if (Auth::user()->dokumentasi == 1)
                 <a href="{{ route('ChatUi') }}"><li class="font-bold text-xl text-white pl-1 border-b border-white">Chat</li></a>
            @endif
            </ul>
       </div>
       </nav>
    <div class="lg:flex lg:justify-start bg-gray-100">
        <div class="lg:shadow-xl lg:mt-10 lg:ml-10  bg-white lg:w-6xl lg:h-190 w-92 ml-3 h-148 mt-3 overflow-auto">
            <h1 class="lg:text-2xl  lg:text-center lg:font-bold lg:p-3 text-center text-xl font-bold"> Riwayat Presensi</h1>
            <table class="ml-2 lg:ml-5 justify-self-center lg:mt-5 mt-2">
                <tr class="border-b border-gray-300">
                    <th class="p-3 lg:p-3">ID</th><th class="p-3 lg:p-3">Tanggal</th><th class="p-3 lg:p-3">Status</th>
                </tr>
                @foreach ( $presensi as $single_data)
                        <tr class="border-b border-gray-300">
                            <td class="p-1 lg:p-3 lg:text-xl text-base">{{ $single_data->id }}</td>
                            <td class="p-1 lg:p-3 lg:text-xl text-base">{{ $single_data->created_at }}</td>
                            <td class="p-1 lg:p-3 lg:text-xl text-base">
                             @if($single_data->status == 0)
                            Hadir

                        @elseif($single_data->status == 1)
                            Izin
                            @elseif($single_data->status == 2)
                            Sakit
                        @elseif($single_data->status == 3)
                            Alpha

                            @endif

                        </td>
                        </tr>
                @endforeach
            </table>
        </div>
        <div class="lg:shadow-xl lg:mt-10 lg:ml-10 lg:w-xl  lg:h-190 shadow-xl bg-white w-92 ml-3 mt-5">
            <h1 class="lg:text-2xl lg:w-xl lg:text-center lg:font-bold lg:p-3 font-bold text-xl ">Presensi</h1>
            <form action="{{ route('SubmitAbsen') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="lg:flex lg:justify-self-start lg:pt-10 lg:items-center lg:justify-items-center">
                <div class="justify-self-center lg:justify-self-start pt-10 lg:pt-0 lg:text-xl lg:ml-10">
                    <label for="status">Status Kehadiran : </label>
                </div>
                <div class="justify-self-center lg:justify-self-start lg:ml-2">
                    <select id="status" name="status" class=" text-xl p-2">
                        <option value="0">Hadir</option>
                        <option value="1">Izin</option>
                        <option value="2">Sakit</option>
                    
                    </select>
                </div>
            </div>
            <div class="lg:flex lg:justify-start lg:items-center lg:justify-items-center pt-5 lg:ml-7">
                <div class="  justify-self-center lg:justify-self-start lg:ml-3">
                    <label class="text-xl"  for="">Bukti Foto : </label>
                </div>
                <div class="justify-self-center lg:justify-self-start  bg-gray-50 rounded-4xl lg:w-96 lg:ml-3 p-1 mt-1">
                    <input type="file" name="image" id="" class="text-xs lg:text-xl">
                </div>
                
            </div>
            <div class="justify-self-center lg:justify-self-center  pt-10">
                    <button type="submit" class="border border-indigo-500 p-1 rounded-4xl w-32 mb-5">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>