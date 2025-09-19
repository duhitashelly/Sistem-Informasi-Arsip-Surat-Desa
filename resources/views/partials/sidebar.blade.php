<div class="p-2 xl:hidden">
  <button id="toggleSidebar"
    class="p-2 text-slate-700 dark:text-white rounded-lg border border-gray-300">
    <i class="fas fa-bars"></i>
  </button>
</div>

<!-- Sidebar (kode asli kamu) -->
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 
  overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl 
  dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" 
  aria-expanded="false" id="sidebar">

  <div class="h-19">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" id="sidebarClose"></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{ route('arsip.index') }}">
      <img src="{{ asset('template/build/assets/img/apple-icon.jpg') }}" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
      <img src="{{ asset('template/build/assets/img/apple-icon.jpg') }}" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
      <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Arsip Surat Desa</span>
    </a>
  </div>

  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent 
    dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      {{-- Arsip --}}
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors
          {{ Request::is('arsip*') ? 'bg-blue-500/13 font-semibold text-slate-700' : 'text-slate-600 hover:bg-gray-100' }}"
          href="{{ route('arsip.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-folder-17"></i>
          </div>
          <span class="ml-1">Arsip</span>
        </a>
      </li>

      {{-- Kategori Surat --}}
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors
          {{ Request::is('kategori*') ? 'bg-blue-500/13 font-semibold text-slate-700' : 'text-slate-600 hover:bg-gray-100' }}"
          href="{{ route('kategori.index') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-email-83"></i>
          </div>
          <span class="ml-1">Kategori Surat</span>
        </a>
      </li>

      {{-- About --}}
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors
          {{ Request::is('about*') ? 'bg-blue-500/13 font-semibold text-slate-700' : 'text-slate-600 hover:bg-gray-100' }}"
          href="{{ url('/about') }}">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-single-02"></i>
          </div>
          <span class="ml-1">About</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

<!-- Script toggle -->
<script>
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggleSidebar'); 
  const closeBtn = document.getElementById('sidebarClose');

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  }
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
    });
  }
</script>
