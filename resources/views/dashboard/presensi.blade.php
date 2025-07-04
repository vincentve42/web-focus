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
                        <ul class="sm:flex hidden">
                            <li class="font-bold text-xl">Home</li>
                            <li class="font-bold pl-5 text-xl">Presensi</li>
                            <li class="font-bold pl-5 text-xl">Kas</li>
                        </ul>
                        <button @click="navbar = !navbar;"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 sm:hidden text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg></button>
                    </div>
                    
                </div>
            
            <div class="p-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>

            </div>
        </div>
        <div x-show="navbar" class="sm:hidden bg-indigo-500">
        <ul>
            <li class="font-bold text-xl pl-1 border-b border-white">Home</li>
            <li class="font-bold text-xl pl-1 border-b border-white">Presensi</li>
            <li class="font-bold text-xl pl-1 border-b border-white">Kas</li>
            </ul>
       </div> 
       </nav>
    <div class="sm:flex sm:justify-star bg-gray-100">
        <div class="sm:shadow-xl sm:mt-10 sm:ml-10  bg-white sm:w-6xl sm:h-190 w-92 ml-3 h-148 mt-3">
            <h1 class="sm:text-2xl  sm:text-center sm:font-bold sm:p-3 text-center text-xl font-bold"> Riwayat Presensi</h1>
        </div>
        <div class="sm:shadow-xl sm:mt-10 sm:ml-10 sm:w-xl  sm:h-190 shadow-xl bg-white w-92 ml-3 mt-5">
            <h1 class="sm:text-2xl sm:w-xl sm:text-center sm:font-bold sm:p-3 font-bold text-xl ">Presensi</h1>
            <form action="{{ route('SubmitAbsen') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="sm:flex sm:justify-self-start sm:pt-10 sm:items-center sm:justify-items-center">
                <div class="justify-self-center sm:justify-self-start pt-10 sm:pt-0 sm:text-xl sm:ml-10">
                    <label for="status">Status Kehadiran : </label>
                </div>
                <div class="justify-self-center sm:justify-self-start sm:ml-2">
                    <select id="status" name="status" class=" text-xl p-2">
                        <option value="0">Hadir</option>
                        <option value="1">Izin</option>
                        <option value="2">Sakit</option>
                    
                    </select>
                </div>
            </div>
            <div class="sm:flex sm:justify-start sm:items-center sm:justify-items-center pt-5 sm:ml-7">
                <div class="  justify-self-center sm:justify-self-start sm:ml-3">
                    <label class="text-xl"  for="">Bukti Foto : </label>
                </div>
                <div class="justify-self-center sm:justify-self-start  bg-gray-50 rounded-4xl sm:w-96 sm:ml-3 p-1 mt-1">
                    <input type="file" name="image" id="" class="text-xs sm:text-xl">
                </div>
                
            </div>
            <div class="justify-self-center sm:justify-self-center  pt-10">
                    <button type="submit" class="border border-indigo-500 p-1 rounded-4xl w-32 mb-5">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>