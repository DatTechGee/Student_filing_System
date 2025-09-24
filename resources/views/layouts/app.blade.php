<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Student Filing System')</title>
  <!-- Tailwind CDN (quick) -->
  <script src="https://cdn.tailwindcss.com"></script>
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
  <nav class="bg-white shadow p-4 stic">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
      <a href="/" class="text-xl font-bold text-green-700"> Student Filing System</a>
      <div class="flex gap-2">
        @if(session('admin_id'))
          <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🛡️</span> Admin Dashboard</a>
          <a href="{{ route('admin.logout') }}" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🚪</span> Logout</a>
        @elseif(session('student_id'))
          <a href="{{ route('student.dashboard') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🎓</span> Student Dashboard</a>
          <a href="{{ route('student.logout') }}" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🚪</span> Logout</a>
        @else
          <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🛡️</span> Admin Login</a>
          <a href="{{ route('student.login') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2 rounded-xl shadow-lg font-bold text-sm flex items-center gap-1 hover:scale-105 transition-all"><span class="text-lg">🎓</span> Student Login</a>
        @endif
      </div>
    </div>
  </nav>

  <main class="max-w-6xl mx-auto mt-8 p-4">
    @if(session('success'))
      <div class="bg-green-100 border border-green-200 p-3 rounded mb-4 text-green-800">
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="bg-red-100 border border-red-200 p-3 rounded mb-4 text-red-800">
        {{ session('error') }}
      </div>
    @endif

    @yield('content')
  </main>

  <!-- Password toggle script -->
  <script>
    function togglePassword(id, eyeId) {
      const el = document.getElementById(id);
      const eye = document.getElementById(eyeId);
      if (!el) return;
      if (el.type === 'password') {
        el.type = 'text';
        if (eye) eye.textContent = '🙈';
      } else {
        el.type = 'password';
        if (eye) eye.textContent = '👁️';
      }
    }
  </script>
</body>
</html>
