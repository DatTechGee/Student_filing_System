@extends('layouts.app')
@section('title','Re-upload Document')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-xl w-full border border-green-100">
    <h3 class="text-2xl font-bold text-green-700 mb-6">Re-upload Document</h3>
    <div class="mb-4 text-gray-700">Current file: <span class="font-semibold">{{ $doc->original_filename }}</span></div>
    @if(session('error'))
      <div class="bg-red-100 border border-red-200 p-3 rounded mb-4 text-red-800">{{ session('error') }}</div>
    @endif
    @if(session('success'))
      <div class="bg-green-100 border border-green-200 p-3 rounded mb-4 text-green-800">{{ session('success') }}</div>
    @endif
    <form action="{{ route('student.uploads.update', $doc->id) }}" method="post" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-2">Choose new file (pdf/jpg/png - max 10MB)</label>
        <input type="file" name="file" class="w-full border p-3 rounded mb-4" required>
        @error('file')
          <div class="bg-red-100 border border-red-200 p-2 rounded text-red-800 text-sm mt-2">{{ $message }}</div>
        @enderror
      </div>
      <div class="flex justify-center gap-4">
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all">Re-upload</button>
        <a href="{{ route('student.uploads.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold text-lg hover:bg-gray-200 transition-all">Back</a>
      </div>
    </form>
  </div>
</div>
@endsection
