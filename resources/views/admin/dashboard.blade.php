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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-6 mb-12">
      <div class="bg-white border-t-8 border-green-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-green-600 text-5xl">🏫</span>
        <h3 class="text-lg font-bold text-green-800 mb-1">Faculties</h3>
        <p class="text-3xl font-extrabold text-green-900">{{ $facultiesCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-purple-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-purple-600 text-5xl">🏢</span>
        <h3 class="text-lg font-bold text-purple-800 mb-1">Departments</h3>
        <p class="text-3xl font-extrabold text-purple-900">{{ $departmentsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-blue-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-blue-600 text-5xl">👨‍🎓</span>
        <h3 class="text-lg font-bold text-blue-800 mb-1">Students</h3>
        <p class="text-3xl font-extrabold text-blue-900">{{ $studentsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-yellow-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-yellow-500 text-5xl">📄</span>
        <h3 class="text-lg font-bold text-yellow-800 mb-1">Requirements</h3>
        <p class="text-3xl font-extrabold text-yellow-900">{{ $requirementsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-pink-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-pink-500 text-5xl">🗂️</span>
        <h3 class="text-lg font-bold text-pink-800 mb-1">Uploads</h3>
        <p class="text-3xl font-extrabold text-pink-900">{{ $uploadedFilesCount }}</p>
      </div>
    </div>
  <div class="flex gap-4 flex-wrap justify-center mt-8">
    <a href="{{ route('faculties.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-green-400 to-green-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">🏫</span> Manage Faculties
    </a>
    <a href="{{ route('departments.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-purple-400 to-purple-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">🏢</span> Manage Departments
    </a>
    <a href="{{ route('students.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">👨‍🎓</span> Manage Students
    </a>
    <a href="{{ route('students.bulk_upload') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">📥</span> Bulk Upload Students
    </a>
    <a href="{{ route('document-requirements.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">📄</span> Document Requirements
    </a>
    <a href="{{ route('admin.uploads.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-pink-400 to-pink-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">🗂️</span> View Uploads
    </a>
  </div>
    </div>
  </main>
</div>
@endsection
