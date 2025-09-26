
@extends('layouts.app')
@section('title','My Uploads')
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
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M19.5 14.25V6.75A2.25 2.25 0 0017.25 4.5H6.75A2.25 2.25 0 004.5 6.75v10.5A2.25 2.25 0 006.75 19.5h7.5'/><path stroke-linecap='round' stroke-linejoin='round' d='M16.5 17.25L19.5 20.25 22.5 17.25'/></svg></span> My Documents
        </a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">My Uploads</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-4 md:p-10 animate-site-fade-in">
    <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-10 max-w-3xl w-full border border-green-100">
      <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-4 md:mb-6">Welcome, {{ session('student_name') }}</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
        @foreach($requirements as $req)
          <div class="border rounded-xl p-6 bg-rose-50 shadow-md flex flex-col justify-between">
            <div>
              <h3 class="font-semibold text-lg mb-2">{{ $req->name }}</h3>
              <p class="text-sm text-gray-600 mb-2">
                Scope: {{ $req->scope_type }}
                @if($req->scope_type == 'faculty' && $req->faculty_id)
                  (Faculty: {{ optional(App\Models\Faculty::find($req->faculty_id))->name }})
                @elseif($req->scope_type == 'department' && $req->department_id)
                  (Department: {{ optional(App\Models\Department::find($req->department_id))->name }})
                @endif
              </p>
            </div>
            <div class="text-right mt-4">
              @if(isset($uploaded[$req->id]))
                <div class="text-green-700 font-semibold">Uploaded</div>
                <div class="text-xs text-gray-600 mb-1">Uploaded at: {{ $uploaded[$req->id]->uploaded_at }}</div>
                @if($uploaded[$req->id]->resubmission_requested)
                  <div class="text-red-700 font-bold text-xs mb-1">Resubmission Requested</div>
                @endif
                <a class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-white font-bold shadow hover:scale-105 transition-all mr-2" href="{{ route('student.uploads.edit', $uploaded[$req->id]->id) }}">
                  <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M4.5 12a7.5 7.5 0 1115 0 7.5 7.5 0 01-15 0zm7.5-4.5v4.5l3 1.5'/></svg></span> Re-upload
                </a>
                <a class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-purple-100 text-purple-800 font-semibold shadow hover:bg-purple-200 transition-all" href="{{ route('student.uploads.download', $uploaded[$req->id]->id) }}" target="_blank">
              <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg></span> View
                </a>
              @else
                <div class="text-red-700 font-semibold mb-1">Pending</div>
                <a class="bg-gradient-to-r from-green-500 to-green-700 text-white px-4 py-2 rounded-xl shadow font-bold text-sm hover:scale-105 transition-all" href="{{ route('student.uploads.create', $req->id) }}">Upload</a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </main>
</div>
@endsection
