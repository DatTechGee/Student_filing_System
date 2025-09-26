<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Student Filing System')</title>
  <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
  <!-- Tailwind CDN (quick) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js for interactivity -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    /* tweak for light green primary */
    :root {
      --primary: #10b981; /* emerald-500 */
      --primary-600: #059669;
    }
    .btn-primary { background-color: var(--primary); color: white; }
    .btn-primary:hover { background-color: var(--primary-600); }
  </style>
</head>
<body class="bg-green-50 min-h-screen text-gray-800">
  <nav class="bg-white shadow p-4 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <a href="/" class="text-xl font-bold text-green-700 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-700"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3l9 4.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9L12 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6" /></svg>
        Student Filing System
      </a>
      <div class="flex gap-2">
        @if(session('admin_id'))
          <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 0l9 4.5M12 3l-9 4.5" /></svg>
            Admin Dashboard
          </a>
          <a href="{{ route('admin.logout') }}" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" /><path stroke-linecap="round" stroke-linejoin="round" d="M18 15l3-3m0 0l-3-3m3 3H9" /></svg>
            Logout
          </a>
        @elseif(session('student_id'))
          <a href="{{ route('student.dashboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5"/></svg>
            Student Dashboard
          </a>
          <a href="{{ route('student.logout') }}" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" /><path stroke-linecap="round" stroke-linejoin="round" d="M18 15l3-3m0 0l-3-3m3 3H9" /></svg>
            Logout
          </a>
        @else
          <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 0l9 4.5M12 3l-9 4.5" /></svg>
            Admin Login
          </a>
          <a href="{{ route('student.login') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5"/></svg>
            Student Login
          </a>
        @endif
      </div>
    </div>
  </nav>

  <main class="max-w-6xl mx-auto mt-8 p-4 animate-site-fade-in">

    @if(session('success'))
      <x-toast>
        {{ session('success') }}
      </x-toast>
    @endif
    @if(session('error'))
      <x-toast>
        <span class="text-red-700">{{ session('error') }}</span>
      </x-toast>
    @endif

    @yield('content')
  </main>
  <style>
  @keyframes site-fade-in {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-site-fade-in {
    animation: site-fade-in 0.6s cubic-bezier(0.4,0,0.2,1);
  }
  @keyframes notification-fade-in {
    from { opacity: 0; transform: scale(0.95); }
    60% { opacity: 1; transform: scale(1.03); }
    to { opacity: 1; transform: scale(1); }
  }
  .animate-notification-fade-in {
    animation: notification-fade-in 0.5s cubic-bezier(0.4,0,0.2,1);
  }
  </style>

  <!-- Password toggle script -->
  <script>
    function togglePassword(id, eyeId) {
      const el = document.getElementById(id);
      const eye = document.getElementById(eyeId);
      if (!el) return;
      // SVGs for open and closed eye
      const openEye = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>`;
      const closedEye = `<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"w-5 h-5\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M3.98 8.223A10.477 10.477 0 001.5 12s3.75 7.5 10.5 7.5c2.042 0 3.93-.393 5.57-1.077M21 21l-18-18m3.98 3.98A10.477 10.477 0 0122.5 12s-3.75-7.5-10.5-7.5c-2.042 0-3.93.393-5.57 1.077\" /><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9.88 9.88a3 3 0 104.24 4.24\" /></svg>`;
      if (el.type === 'password') {
        el.type = 'text';
        if (eye) eye.innerHTML = closedEye;
      } else {
        el.type = 'password';
        if (eye) eye.innerHTML = openEye;
      }
    }
  </script>
</body>
</html>
