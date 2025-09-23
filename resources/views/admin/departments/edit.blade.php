@extends('layouts.app')
@section('title','Edit Department')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
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
      <h2 class="text-3xl font-bold text-green-700 mb-8">Edit Department</h2>
      @if($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
          <ul class="list-disc pl-5 text-left">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('departments.update', $department->id) }}" method="post" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
          <label class="block text-sm font-semibold mb-2">Faculty</label>
          <select name="faculty_id" class="w-full border p-3 rounded mb-4" required>
            @foreach($faculties as $faculty)
              <option value="{{ $faculty->id }}" @if($department->faculty_id == $faculty->id) selected @endif>{{ $faculty->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block text-sm font-semibold mb-2">Department Name</label>
          <input type="text" name="name" value="{{ $department->name }}" class="w-full border p-3 rounded mb-4" required>
        </div>
        <div class="flex justify-center gap-4">
          <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all">Update</button>
          <a href="{{ route('departments.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold text-lg hover:bg-gray-200 transition-all">Back</a>
        </div>
      </form>
    </div>
  </main>
</div>
@endsection
