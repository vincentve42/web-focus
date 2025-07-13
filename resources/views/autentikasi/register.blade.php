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
 
         
    </head>
    <body>
        <div class="lg:justify-self-end lg:mr-40 lg:mt-40 lg:w-96 lg:h-128 text-2xl justify-self-center lg:border lg:border-indigo-500 rounded-2xl">
            <form action="{{ route('Register') }}" method="post">
                @csrf
                <h1 class="lg:justify-self-start lg:ml-10 lg:pl-5 pt-5 justify-self-center font-bold">Focus</h1>
                <h1 class="lg:justify-self-start lg:ml-14 justify-self-center font-bold">Xavega</h1>
                <div class="flex justify-start lg:justify-self-start justify-self-center lg:ml-7 lg:mt-10 lg:pt-5  border-b border-black text-xl pt-10">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>

                    </div>
                    <div class="pl-2">
                        <input type="text" placeholder="Enter your Username " name="name" class="">
                    </div>
                </div>
                <div class="flex justify-start lg:justify-self-start justify-self-center lg:ml-7 lg:mt-1 lg:pt-3  border-b border-black text-xl pt-5">
                    <div>
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-8 text-gray-300">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>

                    </div>
                    <div class="pl-2">
                        <input type="text" name="email" placeholder="Enter your Email " class="">
                    </div>
                </div>
                <div class="flex justify-start lg:justify-self-start justify-self-center lg:ml-7  lg:pt-3 pt-5  border-b border-black text-xl">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>


                    </div>
                    <div class="pl-2">
                        <input type="password" name="password" placeholder="Enter your Password " class="">
                    </div>
                </div>
             <div class="justify-self-center lg:justify-self-start pt-10">
                <button class="lg:ml-10 lg:mt-7 lg:p-2 p-3 border border-indigo-500 rounded-3xl text-xl lg:w-32 w-48">Register</button>
             </div>
            @if ($errors->any())
<div class="pt-5 justify-self-center text-xs lg:text-xs lg:ml-5 lg:justify-self-start text-red-500">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
            </form>
            <a href="{{ route('LoginUi') }}"><p class="text-blue-500 lg:ml-10 justify-self-center lg:justify-self-start lg:text-xl pt-5 text-xl/3">Have An Account?</p></a>
        </div>
    </body>
</html>