<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard')</title>

  {{-- Icons & Fonts --}}
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/build/assets/img/apple-icon.png') }}" />
  <link rel="icon" type="image/png" href="{{ asset('template/build/assets/img/favicon.png') }}" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  {{-- Nucleo Icons --}}
  <link href="{{ asset('template/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('template/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  {{-- Main Styling --}}
  <link href="{{ asset('template/build/assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
</head>
<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

  {{-- Background color --}}
  <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

  {{-- Sidebar --}}
  @include('partials.sidebar')

  {{-- Main area --}}
  <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    {{-- Navbar --}}
    @include('partials.navbar')
  <!-- Pesan Global -->
<div class="w-full px-6 py-6 mx-auto">

    {{-- Pesan Global --}}
    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-white bg-green-500 rounded-lg shadow-lg" role="alert">
            <svg class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 
                      00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 
                      00-1.414 1.414l2 2a1 1 0 001.414 
                      0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <div class="flex-1">
                <span class="font-semibold">Sukses!</span> {{ session('success') }}
            </div>
            <button type="button" onclick="this.parentElement.remove()" 
                    class="ml-4 text-white hover:text-gray-200 font-bold">✕</button>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-white bg-red-500 rounded-lg shadow-lg" role="alert">
            <svg class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" 
                      d="M18.364 5.636a9 9 0 
                      11-12.728 0 9 9 0 
                      0112.728 0zM9 7a1 1 0 
                      112 0v4a1 1 0 11-2 0V7zm1 
                      8a1.5 1.5 0 100-3 1.5 1.5 
                      0 000 3z" clip-rule="evenodd"></path>
            </svg>
            <div class="flex-1">
                <span class="font-semibold">Error!</span> {{ session('error') }}
            </div>
            <button type="button" onclick="this.parentElement.remove()" 
                    class="ml-4 text-white hover:text-gray-200 font-bold">✕</button>
        </div>
    @endif
</div>

    {{-- Content --}}
    <div class="w-full px-6 py-6 mx-auto">
      @yield('content')
    </div>

    {{-- Footer --}}
    @include('partials.footer')
  </main>

  {{-- Modal section agar selalu di atas --}}
  @yield('modal')


<!-- Konten Halaman -->


  {{-- Scripts --}}
  @yield('scripts')
  @stack('scripts')

  <script src="{{ asset('template/build/assets/js/plugins/chartjs.min.js') }}" async></script>
  <script src="{{ asset('template/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
  <script src="{{ asset('template/build/assets/js/argon-dashboard-tailwind.js') }}" async></script>
</body>
</html>
