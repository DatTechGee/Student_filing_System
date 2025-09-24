@extends('layouts.app')
@section('title','Add Department')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b sticky top-0 z-30 bg-white">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8 sticky top-20 z-20 bg-white">
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('admin.dashboard') ? 'ring-2 ring-green-400 scale-105' : '' }}">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6'/></svg></span> Dashboard
        </a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-blue-400 to-blue-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all {{ request()->routeIs('faculties.index') ? 'ring-2 ring-blue-400 scale-105' : '' }}">
          <span class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5L12 5l9 5.5M4.5 10.5v7.25A1.25 1.25 0 005.75 19h12.5a1.25 1.25 0 001.25-1.25V10.5" />
              <rect x="7" y="14" width="10" height="2" rx="1" fill="#3B82F6"/>
            </svg>
          </span> Faculties
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
      </nav>
    </div>
    <div class="p-8 border-t">
      <a href="{{ route('admin.logout') }}" class="py-2 px-3 rounded bg-red-100 text-red-700 font-semibold hover:bg-red-200">Logout</a>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-lg w-full border border-green-100">
  <form action="{{ route('departments.store') }}" method="post">
    @csrf
    <label class="block mb-2">Faculty</label>
    <select name="faculty_id" class="w-full border p-2 rounded mb-3">
      @foreach($faculties as $f)<option value="{{ $f->id }}">{{ $f->name }}</option>@endforeach
    </select>
    <label class="block mb-2">Department Name</label>
    <input type="text" name="name" class="w-full border p-2 rounded mb-3">
    <button class="btn-primary px-4 py-2 rounded">Save</button>
  </form>
    </div>
  </main>
</div>
@endsection
