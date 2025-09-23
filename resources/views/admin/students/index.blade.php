@extends('layouts.app')
@section('title','Students')
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
           <a href="{{ route('students.index') }}" class="py-2 px-3 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">👨‍🎓</span> Students</a>
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
  <main class="flex-1 p-10">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-bold text-green-700">Students</h2>
      <a href="{{ route('students.create') }}" class="btn-primary px-6 py-3 rounded shadow">Add Student</a>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
      <table class="w-full text-left">
        <thead>
          <tr class="bg-green-100">
            <th class="p-3">Matric No</th>
            <th class="p-3">Name</th>
            <th class="p-3">Faculty</th>
            <th class="p-3">Department</th>
            <th class="p-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $s)
          <tr class="border-b hover:bg-green-50">
            <td class="p-3">{{ $s->matric_no }}</td>
            <td class="p-3">{{ $s->first_name }} {{ $s->last_name }}</td>
            <td class="p-3">{{ $s->faculty->name }}</td>
            <td class="p-3">{{ $s->department->name }}</td>
            <td class="p-3">
              <a href="{{ route('students.edit',$s) }}" class="text-blue-600 hover:text-blue-800 mr-2 inline-block" title="Edit">
                <span class="text-xl">✏️</span>
              </a>
              <form action="{{ route('students.destroy',$s) }}" method="post" class="inline">@csrf @method('DELETE')
                <button class="text-red-600 hover:text-red-800 inline-block" title="Delete">
                  <span class="text-xl">🗑️</span>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="mt-6">{{ $students->links() }}</div>
    </div>
  </main>
</div>
@endsection
