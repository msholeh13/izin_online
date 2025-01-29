<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title> @yield('title') | E-Cuti </title>
  
  {{-- @vite('resources/css/app.css') --}}
  <link rel="stylesheet" href="{{asset('assets/tailwind/app-BQOdy79v.css')}}">
  <link rel="stylesheet" href="{{asset('assets/tailwind/app-Xaw6OIO1.js')}}">
</head>
<body class="bg-[#F8F9FE]">
    <main class="relative {{request()->routeIs('e-dashboard') ? 'bg-[#006FFD]' : 'bg-white' }} max-w-[640px] mx-auto min-h-screen flex flex-col has-[#CTA-nav]:pb-[120px] has-[#Bottom-nav]:pb-[120px]">

        @yield('content')
    
    </main>
</body>
</html>