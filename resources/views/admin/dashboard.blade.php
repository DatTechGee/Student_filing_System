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
<nav class="mt-8 flex flex-col gap-2 px-8 sticky top-20 z-20 bg-white">
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('admin.dashboard') ? 'ring-2 ring-green-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6'/></svg></span> Dashboard
        </a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-blue-400 to-blue-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('faculties.index') ? 'ring-2 ring-blue-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M12 6v6l4 2'/><rect width='20' height='12' x='2' y='6' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/></svg></span> Faculties
        </a>
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-purple-400 to-purple-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('departments.index') ? 'ring-2 ring-purple-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2'/></svg></span> Departments
        </a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-400 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('document-requirements.index') ? 'ring-2 ring-green-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M8 6h8M8 10h8M8 14h4'/></svg></span> Requirements
        </a>
        <a href="{{ route('students.bulk_upload') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('students.bulk_upload') ? 'ring-2 ring-yellow-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 12v4m0 0l-2-2m2 2l2-2'/></svg></span> Bulk Upload
        </a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('admin.uploads.index') ? 'ring-2 ring-yellow-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 12v4m0 0l-2-2m2 2l2-2'/></svg></span> Uploads
        </a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-400 to-indigo-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('students.index') ? 'ring-2 ring-indigo-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5'/></svg></span> Students
        </a>
        <!-- Settings always last -->
       
        <a href="{{ route('admin.settings') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-gray-400 to-gray-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('admin.settings') ? 'ring-2 ring-gray-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.01c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.01 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.01 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.01c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.01c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.01-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.01-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.01z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg></span> Settings
        </a>
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
        <span class="mb-3 text-green-600 text-5xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5l9-6 9 6M4.5 10.5v7.5a1.5 1.5 0 001.5 1.5h12a1.5 1.5 0 001.5-1.5v-7.5" /></svg>
        </span>
        <h3 class="text-lg font-bold text-green-800 mb-1">Faculties</h3>
        <p class="text-3xl font-extrabold text-green-900">{{ $facultiesCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-purple-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-purple-600 text-5xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2"/></svg>
        </span>
        <h3 class="text-lg font-bold text-purple-800 mb-1">Departments</h3>
        <p class="text-3xl font-extrabold text-purple-900">{{ $departmentsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-blue-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-blue-600 text-5xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5"/></svg>
        </span>
        <h3 class="text-lg font-bold text-blue-800 mb-1">Students</h3>
        <p class="text-3xl font-extrabold text-blue-900">{{ $studentsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-yellow-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-yellow-500 text-5xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12"><rect width="16" height="20" x="4" y="2" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h8M8 10h8M8 14h4"/></svg>
        </span>
        <h3 class="text-lg font-bold text-yellow-800 mb-1">Requirements</h3>
        <p class="text-3xl font-extrabold text-yellow-900">{{ $requirementsCount }}</p>
      </div>
      <div class="bg-white border-t-8 border-pink-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
        <span class="mb-3 text-pink-500 text-5xl">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v4m0 0l-2-2m2 2l2-2"/></svg>
        </span>
        <h3 class="text-lg font-bold text-pink-800 mb-1">Uploads</h3>
        <p class="text-3xl font-extrabold text-pink-900">{{ $uploadedFilesCount }}</p>
      </div>
    </div>
  <div class="flex gap-4 flex-wrap justify-center mt-8">
    <a href="{{ route('faculties.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-green-400 to-green-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5l9-6 9 6M4.5 10.5v7.5a1.5 1.5 0 001.5 1.5h12a1.5 1.5 0 001.5-1.5v-7.5" /></svg>
      </span> Manage Faculties
    </a>
    <a href="{{ route('departments.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-purple-400 to-purple-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2"/></svg>
      </span> Manage Departments
    </a>
    <a href="{{ route('students.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-blue-400 to-blue-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5"/></svg>
      </span> Manage Students
    </a>
    <a href="{{ route('students.bulk_upload') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v4m0 0l-2-2m2 2l2-2"/></svg>
      </span> Bulk Upload Students
    </a>
    <a href="{{ route('document-requirements.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><rect width="16" height="20" x="4" y="2" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h8M8 10h8M8 14h4"/></svg>
      </span> Document Requirements
    </a>
    <a href="{{ route('admin.uploads.index') }}" class="flex items-center gap-3 px-8 py-4 rounded-xl shadow-lg bg-gradient-to-r from-pink-400 to-pink-600 text-white font-bold text-lg hover:scale-105 transition-all">
      <span class="text-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v4m0 0l-2-2m2 2l2-2"/></svg>
      </span> View Uploads
    </a>
  </div>
    </div>
  </main>
</div>
@endsection
