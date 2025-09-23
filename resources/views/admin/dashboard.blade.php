@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')
<!-- Tailwind CSS is loaded via app.css for production build -->
<div class="flex flex-col md:flex-row min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-full md:w-64 bg-white shadow-lg flex flex-col justify-between">
    <div>
      <div class="p-6 border-b">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
      <nav class="mt-4 flex flex-col gap-2 px-6">
        <a href="{{ route('admin.dashboard') }}" class="py-2 px-3 rounded hover:bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('faculties.index') }}" class="py-2 px-3 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏫</span> Faculties</a>
        <a href="{{ route('departments.index') }}" class="py-2 px-3 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
        <a href="{{ route('students.index') }}" class="py-2 px-3 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
        <a href="{{ route('students.bulk_upload') }}" class="py-2 px-3 rounded hover:bg-blue-100 flex items-center gap-2"><span class="text-lg">📥</span> Bulk Upload</a>
        <a href="{{ route('document-requirements.index') }}" class="py-2 px-3 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
        <a href="{{ route('admin.uploads.index') }}" class="py-2 px-3 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
        <a href="{{ route('admin.settings') }}" class="py-2 px-3 rounded hover:bg-yellow-100 text-yellow-700 font-semibold flex items-center gap-2"><span class="text-lg">⚙️</span> Settings</a>
      </nav>
    </div>
    <div class="p-6 border-t">
      <a href="{{ route('admin.logout') }}" class="py-2 px-3 rounded bg-red-100 text-red-700 font-semibold hover:bg-red-200">Logout</a>
    </div>
  </aside>

  <!-- Main dashboard -->
  <main class="flex-1 p-4 md:p-10">
    <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-6 md:mb-8">Dashboard Overview</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-4 md:gap-6 mb-8 md:mb-12">
      <div class="aspect-square max-w-[180px] md:max-w-[220px] w-full bg-gradient-to-br from-green-200 to-green-100 rounded-xl shadow flex flex-col items-center justify-center p-6 md:p-8 break-words mx-auto">
        <span class="mb-2 text-green-700 text-4xl md:text-5xl">&#127891;</span>
        <h3 class="text-base md:text-lg font-bold text-green-800 mb-1 md:mb-2">Faculties</h3>
        <p class="text-2xl md:text-4xl font-bold text-green-900">{{ $facultiesCount }}</p>
      </div>
      <div class="aspect-square max-w-[180px] md:max-w-[220px] w-full bg-gradient-to-br from-purple-200 to-purple-100 rounded-xl shadow flex flex-col items-center justify-center p-6 md:p-8 break-words mx-auto">
        <span class="mb-2 text-purple-700 text-4xl md:text-5xl">&#128218;</span>
        <h3 class="text-base md:text-lg font-bold text-purple-800 mb-1 md:mb-2">Departments</h3>
        <p class="text-2xl md:text-4xl font-bold text-purple-900">{{ $departmentsCount }}</p>
      </div>
      <div class="aspect-square max-w-[180px] md:max-w-[220px] w-full bg-gradient-to-br from-blue-200 to-blue-100 rounded-xl shadow flex flex-col items-center justify-center p-6 md:p-8 break-words mx-auto">
        <span class="mb-2 text-blue-700 text-4xl md:text-5xl">&#128100;</span>
        <h3 class="text-base md:text-lg font-bold text-blue-800 mb-1 md:mb-2">Students</h3>
        <p class="text-2xl md:text-4xl font-bold text-blue-900">{{ $studentsCount }}</p>
      </div>
      <div class="aspect-square max-w-[180px] md:max-w-[220px] w-full bg-gradient-to-br from-yellow-200 to-yellow-100 rounded-xl shadow flex flex-col items-center justify-center p-6 md:p-8 break-words mx-auto">
        <span class="mb-2 text-yellow-700 text-4xl md:text-5xl">&#128221;</span>
        <h3 class="text-base md:text-lg font-bold text-yellow-800 mb-1 md:mb-2">Requirements</h3>
        <p class="text-2xl md:text-4xl font-bold text-yellow-900">{{ $requirementsCount }}</p>
      </div>
       <div class="aspect-square max-w-[180px] md:max-w-[220px] w-full bg-gradient-to-br from-red-200 to-red-100 rounded-xl shadow flex flex-col items-center justify-center p-6 md:p-8 break-words mx-auto">
        <span class="mb-2 text-yellow-700 text-4xl md:text-5xl">&#128190;</span>
        <h3 class="text-base md:text-lg font-bold text-yellow-800 mb-1 md:mb-2">Requirements</h3>
        <p class="text-2xl md:text-4xl font-bold text-yellow-900">{{ $requirementsCount }}</p>
      </div>
    </div>
  <div class="flex gap-2 md:gap-4 flex-wrap">
  <div class="w-full flex flex-wrap justify-center gap-2 md:gap-4">
    <a href="{{ route('faculties.index') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-green-200 text-green-900 hover:bg-green-300 font-semibold"><span class="text-lg">🏫</span> Manage Faculties</a>
    <a href="{{ route('departments.index') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-purple-200 text-purple-900 hover:bg-purple-300 font-semibold"><span class="text-lg">🏢</span> Manage Departments</a>
    <a href="{{ route('students.index') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-blue-200 text-blue-900 hover:bg-blue-300 font-semibold"><span class="text-lg">👨‍🎓</span> Manage Students</a>
    <a href="{{ route('students.bulk_upload') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-blue-600 text-white hover:bg-blue-700 font-semibold"><span class="text-lg">📥</span> Bulk Upload Students</a>
    <a href="{{ route('document-requirements.index') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-yellow-200 text-yellow-900 hover:bg-yellow-300 font-semibold"><span class="text-lg">📄</span> Document Requirements</a>
    <a href="{{ route('admin.uploads.index') }}" class="px-6 py-3 rounded shadow flex items-center gap-2 bg-pink-200 text-pink-900 hover:bg-pink-300 font-semibold"><span class="text-lg">🗂️</span> View Uploads</a>
  </div>
    </div>
  </main>
</div>
@endsection
