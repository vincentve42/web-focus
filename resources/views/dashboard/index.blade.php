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
            <li class="font-bold text-xl pl-1 border-b border-black">Home</li>
            <li class="font-bold text-xl pl-1 border-b border-black">Presensi</li>
            <li class="font-bold text-xl pl-1 border-b border-black">Kas</li>
            </ul>
       </div>
       </nav>
       
    </body>
</html>