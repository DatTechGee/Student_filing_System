@extends('layouts.app')
@section('title','Add Department')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏫</span> Faculties</a>
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
        <a href="{{ route('students.bulk_upload') }}" class="py-3 px-4 rounded hover:bg-blue-100 flex items-center gap-2"><span class="text-lg">📥</span> Bulk Upload</a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Add Department</span>
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
