  
@extends('layouts.app')
@section('title','Add Student')
@section('content')

<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-lg flex flex-col justify-between">
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
      </nav>
    </div>
    <div class="p-6 border-t">
      <a href="{{ route('admin.logout') }}" class="py-2 px-3 rounded bg-red-100 text-red-700 font-semibold hover:bg-red-200">Logout</a>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-10 flex flex-col items-center justify-center">
    <div class="bg-white rounded-lg shadow p-10 w-full max-w-xl">
      <h2 class="text-3xl font-bold text-green-700 mb-8">Add Student</h2>
      <form action="{{ route('students.store') }}" method="post">
        @csrf
        <input name="matric_no" placeholder="Matric No" class="w-full border p-3 rounded mb-4">
        <input name="first_name" placeholder="First Name" class="w-full border p-3 rounded mb-4">
        <input name="last_name" placeholder="Last Name" class="w-full border p-3 rounded mb-4">
        <select name="faculty_id" class="w-full border p-3 rounded mb-4">
          @foreach($faculties as $f)<option value="{{ $f->id }}">{{ $f->name }}</option>@endforeach
        </select>
        <select name="department_id" class="w-full border p-3 rounded mb-4">
          @foreach($departments as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
        </select>
        <input name="session" placeholder="Session" class="w-full border p-3 rounded mb-4">
        <input name="password" type="password" placeholder="Password" class="w-full border p-3 rounded mb-4">
        <button class="btn-primary px-6 py-3 rounded shadow">Save</button>
      </form>
    </div>
  </main>
</div>
@endsection
