
@extends('layouts.app')
@section('title','Student Uploads')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex flex-col md:flex-row">
  <x-sidebar title="Student Panel" footer="Uploads">
    <a href="{{ route('student.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 flex items-center gap-2" @if(request()->routeIs('student.dashboard')) aria-current="page" @endif tabindex="0">
      <span class="text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6"/></svg>
      </span> Dashboard
    </a>
    <a href="{{ route('student.uploads.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-green-500" @if(request()->routeIs('student.uploads.index')) aria-current="page" @endif tabindex="0">
      <span class="text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v4m0 0l-2-2m2 2l2-2"/></svg>
      </span> My Documents
    </a>
  </x-sidebar>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-4 md:p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-4 md:p-10 max-w-full md:max-w-2xl w-full border border-green-100">
      <h2 class="text-xl md:text-3xl font-bold text-green-700 mb-6">Uploads for {{ $student->first_name }} {{ $student->last_name }}</h2>
      <div class="overflow-x-auto">
        <table class="w-full border rounded-xl overflow-hidden shadow text-sm md:text-base">
        <thead>
          <tr class="bg-green-100 text-green-700">
            <th class="p-2 md:p-3 border">Requirement</th>
            <th class="p-2 md:p-3 border">File</th>
          </tr>
        </thead>
        <tbody>
          @foreach($documents as $d)
          <tr class="hover:bg-green-50">
            <td class="border p-2 md:p-3 font-semibold">{{ $d->requirement->name ?? '' }}</td>
            <td class="border p-2 md:p-3">
              <a class="underline text-blue-700" href="{{ route('student.uploads.download', $d->id) }}" target="_blank">{{ $d->original_filename }}</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </main>
</div>
@endsection
