
@extends('layouts.app')
@section('title','View Uploads')
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
  <a href="{{ route('faculties.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏫</span> Faculties</a>
  <a href="{{ route('departments.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏢</span> Departments</a>
  <a href="{{ route('document-requirements.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">📄</span> Requirements</a>
  <a href="{{ route('admin.uploads.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">🗂️</span> Uploads</a>
  <a href="{{ route('students.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Uploads</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
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
        <table class="w-full table-auto border-collapse rounded-xl overflow-hidden shadow">
          <thead>
            <tr class="bg-green-100 text-green-700">
              <th class="border p-3 text-left">Matric</th>
              <th class="border p-3 text-left">Name</th>
              <th class="border p-3 text-left">Faculty</th>
              <th class="border p-3 text-left">Department</th>
              <th class="border p-3 text-left">Uploads</th>
              <th class="border p-3 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($students as $s)
              <tr class="hover:bg-green-50">
                <td class="border p-3 font-semibold">{{ $s->matric_no }}</td>
                <td class="border p-3 font-semibold">{{ $s->first_name }} {{ $s->last_name }}</td>
                <td class="border p-3">{{ $s->faculty->name ?? '' }}</td>
                <td class="border p-3">{{ $s->department->name ?? '' }}</td>
                <td class="border p-3">
                  @foreach($s->documents as $doc)
                    <div class="text-sm">{{ $doc->requirement->name ?? 'Req' }} - <a class="underline text-green-700" href="{{ asset('storage/'.$doc->file_path) }}" target="_blank">View</a></div>
                  @endforeach
                </td>
                <td class="border p-3">
                  <a href="{{ route('admin.uploads.show', $s->id) }}" class="underline text-blue-700">Details</a>
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
