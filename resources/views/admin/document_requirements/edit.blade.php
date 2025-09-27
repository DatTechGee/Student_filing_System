@extends('layouts.app')
@section('title','Edit Requirement')
@section('content')
<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-lg flex flex-col justify-between">
    <div>
      <div class="p-6 border-b">
        <span class="text-2xl font-bold text-green-700">Admin Panel</span>
      </div>
              <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6'/></svg></span> Dashboard
        </a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-blue-400 to-blue-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M12 6v6l4 2'/><rect width='20' height='12' x='2' y='6' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/></svg></span> Faculties
        </a>
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-purple-400 to-purple-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2'/></svg></span> Departments
        </a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-green-400 to-green-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='20' x='4' y='2' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M8 6h8M8 10h8M8 14h4'/></svg></span> Requirements
        </a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-yellow-400 to-yellow-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><rect width='16' height='12' x='4' y='8' rx='2' stroke='currentColor' stroke-width='1.5' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' d='M12 12v4m0 0l-2-2m2 2l2-2'/></svg></span> Uploads
        </a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-400 to-indigo-700 text-white font-bold flex items-center gap-2 shadow hover:scale-105 transition-all">
          <span class="text-lg"><svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5'><path stroke-linecap='round' stroke-linejoin='round' d='M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5'/></svg></span> Students
        </a>
      </nav>
    </div>
    <div class="p-6 border-t">
      <a href="{{ route('admin.logout') }}" class="py-2 px-3 rounded bg-red-100 text-red-700 font-semibold hover:bg-red-200">Logout</a>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 p-10 flex flex-col items-center justify-center">
    <div class="bg-white rounded-lg shadow p-10 w-full max-w-xl">
      <h2 class="text-3xl font-bold text-green-700 mb-8">Edit Requirement</h2>
      <form action="{{ route('document-requirements.update', $documentRequirement) }}" method="post">
        @csrf
        @method('PUT')
        <input name="name" value="{{ $documentRequirement->name }}" placeholder="Requirement Name" class="w-full border p-2 rounded mb-2">
        <select name="scope_type" id="scope_type" class="w-full border p-2 rounded mb-2" onchange="toggleScopeFields()">
          <option value="global" @if($documentRequirement->scope_type=='global') selected @endif>Global</option>
          <option value="faculty" @if($documentRequirement->scope_type=='faculty') selected @endif>Faculty</option>
          <option value="department" @if($documentRequirement->scope_type=='department') selected @endif>Department</option>
        </select>
        <div id="faculty_field" style="display:none;">
          <label class="block mb-1">Select Faculty</label>
          <select name="faculty_id" id="faculty_id" class="w-full border p-2 rounded mb-2">
            <option value="">-- Select Faculty --</option>
            @foreach($faculties as $faculty)
              <option value="{{ $faculty->id }}" @if(isset($documentRequirement->faculty_id) && $documentRequirement->faculty_id == $faculty->id) selected @endif>{{ $faculty->name }}</option>
            @endforeach
          </select>
        </div>
        <div id="department_field" style="display:none;">
          <label class="block mb-1">Select Department</label>
          <select name="department_id" id="department_id" class="w-full border p-2 rounded mb-2">
            <option value="">-- Select Department --</option>
            @foreach($departments as $department)
              <option value="{{ $department->id }}" @if(isset($documentRequirement->department_id) && $documentRequirement->department_id == $department->id) selected @endif>{{ $department->name }}</option>
            @endforeach
          </select>
        </div>
        <label class="block mb-1">Required File Type</label>
        <select name="required_file_type" class="w-full border p-2 rounded mb-4">
          <option value="all" @if($documentRequirement->required_file_type=='all') selected @endif>All (PDF, JPG, JPEG, PNG)</option>
          <option value="pdf" @if($documentRequirement->required_file_type=='pdf') selected @endif>PDF</option>
          <option value="jpg" @if($documentRequirement->required_file_type=='jpg') selected @endif>JPG</option>
          <option value="jpeg" @if($documentRequirement->required_file_type=='jpeg') selected @endif>JPEG</option>
          <option value="png" @if($documentRequirement->required_file_type=='png') selected @endif>PNG</option>
        </select>
        <button class="btn-primary px-4 py-2 rounded">Update</button>
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
