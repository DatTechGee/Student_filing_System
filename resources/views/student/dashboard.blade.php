
@extends('layouts.app')
@section('title','Student Dashboard')
@section('content')
<!-- Tailwind CSS is loaded via app.css for production build -->
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100">
  <!-- Sidebar -->
  <aside class="w-full md:w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Student Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
  <a href="{{ route('student.dashboard') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-green-500 {{ request()->routeIs('student.dashboard') ? 'ring-2 ring-green-400 scale-105' : '' }}" @if(request()->routeIs('student.dashboard')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6'/></svg></span> Dashboard
        </a>
  <a href="{{ route('student.uploads.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 {{ request()->routeIs('student.uploads.index') ? 'ring-2 ring-blue-400 scale-105' : '' }}" @if(request()->routeIs('student.uploads.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M8 6h8M8 10h8M8 14h4'/></svg></span> My Documents
        </a>
  <a href="{{ route('student.change_password') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-500 {{ request()->routeIs('student.change_password') ? 'ring-2 ring-yellow-400 scale-105' : '' }}" @if(request()->routeIs('student.change_password')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 17v-6m0 0V7m0 4h.01'/></svg></span> Change Password
        </a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Student Dashboard</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-4 md:p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-10 max-w-xl w-full text-center border border-green-100">
      <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-4 md:mb-6">Welcome, {{ session('student_name') }}</h2>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Matric No: <span class="font-semibold">{{ $student->matric_no }}</span></div>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Faculty: <span class="font-semibold">{{ $student->faculty->name ?? '' }}</span></div>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Department: <span class="font-semibold">{{ $student->department->name ?? '' }}</span></div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 my-10">
  <div class="bg-white border-t-8 border-green-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-green-600 text-4xl md:text-5xl"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-10 h-10'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M8 6h8M8 10h8M8 14h4'/></svg></span>
          <h3 class="text-lg font-bold text-green-800 mb-1">Required Docs</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-green-900">{{ $requirementsCount }}</p>
        </div>
  <div class="bg-white border-t-8 border-blue-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-blue-600 text-4xl md:text-5xl"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-10 h-10'><path stroke-linecap='round' stroke-linejoin='round' d='M5 13l4 4L19 7'/></svg></span>
          <h3 class="text-lg font-bold text-blue-800 mb-1">Uploaded</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-blue-900">{{ $uploadedCount }}</p>
        </div>
  <div class="bg-white border-t-8 border-red-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-red-500 text-4xl md:text-5xl"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-10 h-10'><path stroke-linecap='round' stroke-linejoin='round' d='M12 17v-6m0 0V7m0 4h.01'/></svg></span>
          <h3 class="text-lg font-bold text-red-800 mb-1">Resubmission Requested</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-red-900">{{ $pendingResubmissions }}</p>
        </div>
      </div>
      <div class="mt-6 md:mt-8">
        <a href="{{ route('student.uploads.index') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 md:px-8 py-2 md:py-3 rounded-xl shadow-lg font-bold text-base md:text-lg hover:scale-105 transition-all">My Documents</a>
      </div>
    </div>
  </main>
</div>
@endsection
