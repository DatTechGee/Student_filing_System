
@extends('layouts.app')
@section('title','Bulk Upload Students')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
        <a href="{{ route('students.bulk_upload') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">📥</span> Bulk Upload</a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏫</span> Faculties</a>
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Bulk Upload Students</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-xl w-full text-center border border-green-100">
      <h2 class="text-3xl font-bold text-green-700 mb-6">Bulk Upload Students</h2>
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
      @if($errors->any())
        <div class="bg-red-100 border border-red-200 p-3 rounded mb-4 text-red-800">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('students.bulk_upload') }}" method="post" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <label class="block mb-2 font-semibold">Upload CSV or Excel file</label>
        <input type="file" name="students_file" accept=".csv,.xlsx,.xls" class="w-full border p-3 rounded mb-4" required>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all">Upload</button>
      </form>
      <div class="mt-4 text-sm text-gray-600">
        <strong>Template:</strong> The file should have columns: <code>matric_no,first_name,<br>last_name,faculty_id,department_id,session,password</code>
      </div>
    </div>
  </main>
</div>
@endsection
