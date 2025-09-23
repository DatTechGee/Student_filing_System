
@extends('layouts.app')
@section('title','Document Requirements')
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
        <a href="{{ route('admin.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏫</span> Faculties</a>
        <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
        <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
        <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
        <a href="{{ route('students.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Requirements</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-3xl w-full border border-green-100">
      <h2 class="text-3xl font-bold text-green-700 mb-6">Requirements</h2>
      <a href="{{ route('document-requirements.create') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all mb-6 inline-block">Add Requirement</a>
      <table class="w-full border rounded-xl overflow-hidden shadow">
        <thead>
          <tr class="bg-green-100 text-green-700">
            <th class="p-3 border">Name</th>
            <th class="p-3 border">Scope</th>
            <th class="p-3 border">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($requirements as $r)
          <tr class="hover:bg-green-50">
            <td class="border p-3 font-semibold">{{ $r->name }}</td>
            <td class="border p-3">{{ $r->scope_type }} {{ $r->scope_id }}</td>
            <td class="border p-3">
              <a href="{{ route('document-requirements.edit',$r) }}" class="underline text-blue-700 mr-2">Edit</a>
              <form action="{{ route('document-requirements.destroy',$r) }}" method="post" class="inline">@csrf @method('DELETE')<button class="underline text-red-700">Delete</button></form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
</div>
@endsection
