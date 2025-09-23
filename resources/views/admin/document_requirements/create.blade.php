@extends('layouts.app')
@section('title','Add Requirement')
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
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Add Requirement</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-lg w-full border border-green-100">
  @if(session('success'))
    <div class="bg-green-100 border border-green-200 p-3 rounded mb-4 text-green-800">
      {{ session('success') }}
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
  <form action="{{ route('document-requirements.store') }}" method="post">
    @csrf
    <input name="name" placeholder="Requirement Name" class="w-full border p-2 rounded mb-2">
    <select name="scope_type" id="scope_type" class="w-full border p-2 rounded mb-2" onchange="toggleScopeFields()">
      <option value="global">Global</option>
      <option value="faculty">Faculty</option>
      <option value="department">Department</option>
    </select>
    <div id="faculty_field" style="display:none;">
      <label class="block mb-1">Select Faculty</label>
      <select name="faculty_id" id="faculty_id" class="w-full border p-2 rounded mb-2">
        <option value="">-- Select Faculty --</option>
        @foreach($faculties as $faculty)
          <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
        @endforeach
      </select>
    </div>
    <div id="department_field" style="display:none;">
      <label class="block mb-1">Select Department</label>
      <select name="department_id" id="department_id" class="w-full border p-2 rounded mb-2">
        <option value="">-- Select Department --</option>
        @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
      </select>
    </div>
    <label class="block mb-1">Required File Type</label>
    <select name="required_file_type" class="w-full border p-2 rounded mb-2">
      <option value="pdf">PDF</option>
      <option value="jpg">JPG</option>
      <option value="jpeg">JPEG</option>
    </select>
    <button class="btn-primary px-4 py-2 rounded">Save</button>
  </form>
  <script>
    function toggleScopeFields() {
      var scope = document.getElementById('scope_type').value;
      document.getElementById('faculty_field').style.display = (scope === 'faculty' || scope === 'department') ? 'block' : 'none';
      document.getElementById('department_field').style.display = (scope === 'department') ? 'block' : 'none';
    }
    document.addEventListener('DOMContentLoaded', toggleScopeFields);
  </script>
    </div>
  </main>
</div>
@endsection
