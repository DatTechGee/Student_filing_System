
@extends('layouts.app')
@section('title','Upload Document')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Student Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('student.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('student.uploads.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">📄</span> My Documents</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Upload Document</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-xl w-full border border-green-100">
      <h3 class="text-2xl font-bold text-green-700 mb-6">Upload: {{ $requirement->name }}</h3>
      @if($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
          <ul class="list-disc pl-5 text-left">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ route('student.uploads.store', $requirement->id) }}" method="post" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
          <label class="block text-sm font-semibold mb-2">Choose file (pdf/jpg/png - max 10MB)</label>
          <input type="file" name="file" class="w-full border p-3 rounded mb-4" required>
        </div>
        <div class="flex justify-center gap-4">
          <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all">Upload</button>
          <a href="{{ route('student.uploads.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold text-lg hover:bg-gray-200 transition-all">Back</a>
        </div>
      </form>
    </div>
  </main>
</div>
@endsection
