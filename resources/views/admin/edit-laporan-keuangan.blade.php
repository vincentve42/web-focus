<html>

<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         @vite('./resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
         
</head>
<body x-data="{kas: false, dokum:false, mobile:false}" class="bg-gray-100">
    

<button @click="mobile = !mobile" data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-indigo-500">
      <ul class="space-y-2 font-medium">
         <img src="{{ asset('asset/focus.png') }}" alt="" class="rounded-full w-32 h-32 justify-self-center">
         <h1 class="text-center text-xl text-white">Focus</h1>
            <div class="flex justify-start items-center justify-items-center pt-5 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
            <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clip-rule="evenodd" />
            
            </svg>
            <li class="text-xl pl-2">Dashboard</li>
            </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
</svg>

            <li class="text-xl pl-2">Laporan Keuangan</li>
            </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
  <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
  <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
</svg>


            <li class="text-xl pl-2">Kas</li>
            <button @click="kas = !kas" class="ml-22"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 pl-3">
            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
            </svg></button>
              
            </div>
             <div class="pl-10 text-xl text-white" x-show="kas">
                     <li>Laporan Keuangan</li>
                     <li class="pt-1">Tagih Siswa</li>
               </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
  <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
  <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
</svg>
            <li class="text-xl pl-2">Dokumentasi</li>
            <button @click="dokum = !dokum"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 pl-3">
            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
            </svg></button>
              
            </div>   
             <div class="pl-10 text-xl text-white" x-show="dokum">
                     <li>Invite Anggota</li>
                     <li class="pt-1">Room Dokumentasi</li>
                     <li class="pt-1">Reward User</li>
            </div>  
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
</svg>


            <li class="text-xl pl-2">Notifikasi</li>
            </div>  
      </ul>
   </div>
</aside>

<div class="h-full px-3 py-4 overflow-y-auto bg-indigo-500" x-show="mobile">
      <ul class="space-y-2 font-medium">
         
            <div class="flex justify-start items-center justify-items-center pt-5 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
            <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clip-rule="evenodd" />
            
            </svg>
            <li class="text-xl pl-2">Dashboard</li>
            </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
</svg>

            <li class="text-xl pl-2">Presensi</li>
            </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
  <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
  <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
</svg>


            <li class="text-xl pl-2">Kas</li>
            <button @click="kas = !kas" class="ml-22"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 pl-3">
            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
            </svg></button>
              
            </div>
             <div class="pl-10 text-xl text-white" x-show="kas">
                     <li>Laporan Keuangan</li>
                     <li class="pt-1">Tagih Siswa</li>
               </div>
            
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
  <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
  <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
</svg>



            <li class="text-xl pl-2">Dokumentasi</li>
            <button @click="dokum = !dokum"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 pl-3">
            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
            </svg></button>
              
            </div>   
             <div class="pl-10 text-xl text-white" x-show="dokum">
                     <li>Invite Anggota</li>
                     <li class="pt-1">Room Dokumentasi</li>
            </div>
            <div class="flex justify-start items-center justify-items-center pt-1 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
  <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
</svg>


            <li class="text-xl pl-2">Notifikasi</li>
            </div>  
      </ul>
   </div>
<div class="sm:pl-80 flex justify-between items-center justify-items-center pb-5 sm:pb-10 border-b border-gray-300 bg-white md:w-500 w-full">
   <div class="sm:ml-5 ml-5 pt-5">
         <h1 class="font-bold sm:text-2xl spt-5 text-xl">Welcome Back</h1>
         <h1 class="sm:text-xl pt-1 text-xs">Hello {{ Auth::user()->name }}! what is your work today??</h1>
   </div>
   <div class='sm:rounded-4xl p-1 sm:p-2 w-32 sm:w-64 bg-gray-100 flex'>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-black sm:text-gray-300">
      <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
      </svg>
      
      <input type="text" placeholder="Search" class=" w-32 sm:pl-2 sm:w-64 ">
      
     <button class="sm:hidden"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-black">
      <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
      </svg></button>
         
         
   </div>
   <div class="sm:pr-10 text-xl">
         
   </div>
   
   
</div>
<div class="sm:flex sm:justify-start">


<div class="sm:ml-80 shadow-xl h-200 bg-white sm:mt-5 sm:w-300 mt-5 sm:mr-5 sm:ml-5">
   <div class="flex justify-between">
      <div>
         <h1 class="text-xl font-bold p-5">Laporan Keuangan</h1>
      </div>
      <div class="flex p-3">
         <div class="">
            <a href="{{ route('BackPage', ['panel' => 1])  }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-black border border-gray-300">
               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
               </svg></a>

         </div>
         <div class="">
           <a href="{{ route('NextPage', ['panel' => 1])  }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-black border border-gray-300">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg></a>


         </div>
          <div class="">
            
            
         </div>
      </div>
   </div>
   <table class=" justify-start ml-2 sm:ml-3">
   
      <tr class="border-b border-black">
         
         <th class="sm:p-3 p-1 sm:text-base text-xs">Keterangan</th>
         <th class="sm:p-3 p-1 sm:text-base text-xs">Keterangan_Tambahan</th>
         <th class="sm:p-3 p-1 sm:text-base text-xs">Debit</th>
         <th class="sm:p-3 p-1 sm:text-base text-xs">Kredit</th>
         <th class="sm:p-3 p-1 sm:text-base text-xs">Nota</th>
         <th class="sm:p-3 p-1 sm:text-base text-xs">Tanggal</th>
      </tr>
      
      <tr class="border-b border-gray-300">
         <td class="p-1 text-center sm:text-base text-xs">{{ $data_keuangan->keterangan_1 }}</td>
         <td class="p-1 text-center sm:text-base text-xs">{{ $data_keuangan->keterangan_2 }}</td>
         <td class="p-1 text-center sm:text-base text-xs">{{ number_format($data_keuangan->debit,2,',','.') }}</td>
         <td class="p-1 text-center sm:text-base text-xs">{{ $data_keuangan->kredit }}</td>
         <td class="p-1 text-center sm:text-base text-xs">{{ $data_keuangan->created_at }}</td>
         
         <td class="p-1 text-center sm:text-base text-xs">
            <a href="https://127.0.0.0:8000/public{{ $data_keuangan->image }}">View Image</a>
         </td>
         <td class="p-1"><a href="{{ route('DeleteLaporanKeuangan', ['id' => $data_keuangan->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sm:size-10 size-6 text-red-500 p-1">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg></a>
</td>

         </tr>
      
   </table>
</div>
<div class="sm:ml-20 shadow-xl bg-white sm:mt-5 sm:mr-20 mt-5 mr-5 ml-5 sm:w-200">
   <h1 class="text-xl font-bold p-5">Edit Laporan</h1>
      <form action="{{ route('AddKeuangan') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="flex items-center justify-items-center justify-self-center sm:justify-self-start  sm:pt-0 sm:text-xl sm:ml-9 sm:mt-5 mt-5 rounded-4xl p-2 bg-gray-100 sm:w-96 w-64">
               <div class="p-1 pt-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-300">
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
               </svg>

               </div>
               <div class=" pt-1">
                    <input type="text" name="name" id="" placeholder="Keterangan" class="sm:text-left text-left p-1 sm:w-82 w-64 focus:rounded-4xl">
               </div>
                </div>
            <div class="flex items-center justify-items-center justify-self-center sm:justify-self-start  sm:pt-0 sm:text-xl sm:ml-9 sm:mt-5 mt-5 rounded-4xl p-2 bg-gray-100 sm:w-96 w-64">
               <div class="p-1 pt-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-300">
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
               </svg>

               </div>
               <div class=" pt-1">
                    <input type="text" name="name_2" id="" placeholder="Keterangan Tambahan" class="sm:text-left text-left p-1 sm:w-82 w-64 focus:rounded-4xl">
               </div>
                </div>
            <div class="flex items-center justify-items-center justify-self-center sm:justify-self-start  sm:pt-0 sm:text-xl sm:ml-9 sm:mt-5 mt-5 rounded-4xl p-2 bg-green-100 sm:w-96 w-64 focus:rounded-4xl">
               <div class="p-1 pt-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>


               </div>
               <div class=" pt-1">
                    <input type="number" name="debit" id="" placeholder="Debit" class="sm:text-left text-left text-green-500 p-1 sm:w-82 w-64 focus:rounded-4xl">
               </div>
                </div>
               <div class="flex items-center justify-items-center justify-self-center sm:justify-self-start  sm:pt-0 sm:text-xl sm:ml-9 sm:mt-5 mt-5 rounded-4xl p-2 bg-red-100 sm:w-96 w-64">
               <div class="p-1 pt-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>


               </div>
               <div class=" pt-1">
                    <input type="number" name="kredit" id="" placeholder="Kredit" class="sm:text-left text-left text-red-500 p-1 sm:w-82 w-64 focus:rounded-4xl">
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
