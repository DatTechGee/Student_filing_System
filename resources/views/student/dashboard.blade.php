
@extends('layouts.app')
@section('title','Student Dashboard')
@section('content')
<!-- Tailwind CSS is loaded via app.css for production build -->
<div class="flex flex-col md:flex-row min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100">
  <!-- Sidebar -->
  <aside class="w-full md:w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Student Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('student.dashboard') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2"><span class="text-lg">🏠</span> Dashboard</a>
        <a href="{{ route('student.uploads.index') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2"><span class="text-lg">📄</span> My Documents</a>
        <a href="{{ route('student.change_password') }}" class="py-3 px-4 rounded hover:bg-yellow-100 text-yellow-700 font-semibold flex items-center gap-2"><span class="text-lg">🔒</span> Change Password</a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Student Dashboard</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-4 md:p-10">
    <div class="bg-white rounded-2xl shadow-2xl p-6 md:p-10 max-w-xl w-full text-center border border-green-100">
      <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-4 md:mb-6">Welcome, {{ session('student_name') }}</h2>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Matric No: <span class="font-semibold">{{ $student->matric_no }}</span></div>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Faculty: <span class="font-semibold">{{ $student->faculty->name ?? '' }}</span></div>
      <div class="mb-2 md:mb-4 text-base md:text-lg text-gray-700">Department: <span class="font-semibold">{{ $student->department->name ?? '' }}</span></div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-8 my-6 md:my-10">
        <div class="p-4 md:p-8 bg-gradient-to-br from-green-200 to-green-100 rounded-xl shadow flex flex-col items-center justify-center">
          <span class="mb-2 text-green-700 text-3xl md:text-4xl">&#128196;</span>
          <h3 class="text-base md:text-lg font-bold text-green-800 mb-1 md:mb-2">Required Docs</h3>
          <p class="text-xl md:text-3xl font-bold text-green-900">{{ $requirementsCount }}</p>
        </div>
        <div class="p-4 md:p-8 bg-gradient-to-br from-blue-200 to-blue-100 rounded-xl shadow flex flex-col items-center justify-center">
          <span class="mb-2 text-blue-700 text-3xl md:text-4xl">&#9989;</span>
          <h3 class="text-base md:text-lg font-bold text-blue-800 mb-1 md:mb-2">Uploaded</h3>
          <p class="text-xl md:text-3xl font-bold text-blue-900">{{ $uploadedCount }}</p>
        </div>
        <div class="p-4 md:p-8 bg-gradient-to-br from-red-200 to-red-100 rounded-xl shadow flex flex-col items-center justify-center">
          <span class="mb-2 text-red-700 text-3xl md:text-4xl">&#128257;</span>
          <h3 class="text-base md:text-lg font-bold text-red-800 mb-1 md:mb-2">Resubmission Requested</h3>
          <p class="text-xl md:text-3xl font-bold text-red-900">{{ $pendingResubmissions }}</p>
        </div>
      </div>
      <div class="mt-6 md:mt-8">
        <a href="{{ route('student.uploads.index') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 md:px-8 py-2 md:py-3 rounded-xl shadow-lg font-bold text-base md:text-lg hover:scale-105 transition-all">My Documents</a>
      </div>
    </div>
  </main>
</div>
@endsection
