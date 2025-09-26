
@extends('layouts.app')
@section('title','View Uploads')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b sticky top-0 z-30 bg-white">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8 sticky top-20 z-20 bg-white">
  <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-green-500 {{ request()->routeIs('admin.dashboard') ? 'ring-2 ring-green-400 scale-105' : '' }}" @if(request()->routeIs('admin.dashboard')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6'/></svg></span> Dashboard
        </a>
  <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-blue-400 to-blue-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 {{ request()->routeIs('faculties.index') ? 'ring-2 ring-blue-400 scale-105' : '' }}" @if(request()->routeIs('faculties.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M12 6v6l4 2'/><rect width='20' height='12' x='2' y='6' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/></svg></span> Faculties
        </a>
  <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-purple-400 to-purple-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-purple-500 {{ request()->routeIs('departments.index') ? 'ring-2 ring-purple-400 scale-105' : '' }}" @if(request()->routeIs('departments.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2'/></svg></span> Departments
        </a>
  <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-400 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-green-400 {{ request()->routeIs('document-requirements.index') ? 'ring-2 ring-green-400 scale-105' : '' }}" @if(request()->routeIs('document-requirements.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M8 6h8M8 10h8M8 14h4'/></svg></span> Requirements
        </a>
  <a href="{{ route('students.bulk_upload') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-500 {{ request()->routeIs('students.bulk_upload') ? 'ring-2 ring-yellow-400 scale-105' : '' }}" @if(request()->routeIs('students.bulk_upload')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 12v4m0 0l-2-2m2 2l2-2'/></svg></span> Bulk Upload
        </a>
  <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-yellow-500 {{ request()->routeIs('admin.uploads.index') ? 'ring-2 ring-yellow-400 scale-105' : '' }}" @if(request()->routeIs('admin.uploads.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 12v4m0 0l-2-2m2 2l2-2'/></svg></span> Uploads
        </a>
  <a href="{{ route('students.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-400 to-indigo-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 {{ request()->routeIs('students.index') ? 'ring-2 ring-indigo-400 scale-105' : '' }}" @if(request()->routeIs('students.index')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5'/></svg></span> Students
        </a>
        <!-- Settings always last -->
  <a href="{{ route('admin.settings') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-gray-400 to-gray-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-gray-500 {{ request()->routeIs('admin.settings') ? 'ring-2 ring-gray-400 scale-105' : '' }}" @if(request()->routeIs('admin.settings')) aria-current="page" @endif tabindex="0">
          <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.01c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.01 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.01 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.01c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.01c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.01-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.01-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.01z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg></span> Settings
        </a>
  
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Uploads</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10 animate-site-fade-in">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-5xl w-full border border-green-100">
      <h2 class="text-3xl font-bold text-green-700 mb-6">Student Uploads</h2>
      <form class="mb-8" method="get">
        <div class="flex gap-4 flex-wrap justify-center">
          <select name="faculty_id" class="border p-3 rounded-xl">
            <option value="">--Faculty--</option>
            @foreach($faculties as $f)
              <option value="{{ $f->id }}" {{ request('faculty_id') == $f->id ? 'selected' : '' }}>{{ $f->name }}</option>
            @endforeach
          </select>
          <select name="department_id" class="border p-3 rounded-xl">
            <option value="">--Department--</option>
            @foreach($departments as $d)
              <option value="{{ $d->id }}" {{ request('department_id') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
            @endforeach
          </select>
          <input name="session" value="{{ request('session') }}" placeholder="Session" class="border p-3 rounded-xl">
          <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all">Filter</button>
        </div>
      </form>
      <div class="overflow-x-auto">
  <table class="w-full table-auto border-separate rounded-2xl overflow-hidden shadow-xl">
          <thead class="sticky top-0 z-20">
            <tr class="bg-green-200/80 text-green-800 backdrop-blur border-b-2 border-green-300">
              <th class="p-4 text-left font-bold whitespace-nowrap">Matric</th>
              <th class="p-4 text-left font-bold whitespace-nowrap">Name</th>
              <th class="p-4 text-left font-bold whitespace-nowrap">Faculty</th>
              <th class="p-4 text-left font-bold whitespace-nowrap">Department</th>
              <th class="p-4 text-left font-bold whitespace-nowrap">Uploads</th>
              <th class="p-4 text-left font-bold whitespace-nowrap">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $s)
              <tr class="even:bg-green-50 odd:bg-white hover:bg-green-100 focus-within:bg-green-200 transition-colors group">
                <td class="p-4 font-semibold rounded-l-2xl max-w-[120px] truncate" title="{{ $s->matric_no }}">{{ $s->matric_no }}</td>
                <td class="p-4 font-semibold max-w-[180px] truncate" title="{{ $s->first_name }} {{ $s->last_name }}">{{ $s->first_name }} {{ $s->last_name }}</td>
                <td class="p-4 max-w-[140px] truncate" title="{{ $s->faculty->name ?? '' }}">{{ $s->faculty->name ?? '' }}</td>
                <td class="p-4 max-w-[140px] truncate" title="{{ $s->department->name ?? '' }}">{{ $s->department->name ?? '' }}</td>
                <td class="p-4">
                  @foreach($s->documents as $doc)
                    <div class="text-sm flex items-center gap-2 mb-1 last:mb-0">
                      <span class="font-medium text-green-800 max-w-[100px] truncate" title="{{ $doc->requirement->name ?? 'Req' }}">{{ $doc->requirement->name ?? 'Req' }}</span>
                      <a class="inline-flex items-center gap-1 underline text-green-700 hover:text-green-900 transition-colors" href="{{ asset('storage/'.$doc->file_path) }}" target="_blank" title="View Document">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
                        <span class="sr-only">View</span>
                      </a>
                    </div>
                  @endforeach
                </td>
                <td class="p-4 flex gap-2 rounded-r-2xl">
                  <a href="{{ route('admin.uploads.show', $s->id) }}" class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:scale-105 transition-all focus:outline-none focus:ring-2 focus:ring-blue-400" title="View Details">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12C3.5 7.5 7.5 4.5 12 4.5s8.5 3 9.75 7.5c-1.25 4.5-5.25 7.5-9.75 7.5s-8.5-3-9.75-7.5z" /></svg>
                    <span class="hidden md:inline">Details</span>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-8">
        {{ $students->links() }}
      </div>
    </div>
  </main>
</div>
@endsection
