
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
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 my-10">
  <div class="bg-white border-t-8 border-green-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-green-600 text-4xl md:text-5xl">📄</span>
          <h3 class="text-lg font-bold text-green-800 mb-1">Required Docs</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-green-900">{{ $requirementsCount }}</p>
        </div>
  <div class="bg-white border-t-8 border-blue-500 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-blue-600 text-4xl md:text-5xl">✅</span>
          <h3 class="text-lg font-bold text-blue-800 mb-1">Uploaded</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-blue-900">{{ $uploadedCount }}</p>
        </div>
  <div class="bg-white border-t-8 border-red-400 rounded-2xl shadow-lg flex flex-col items-center justify-center p-8 transition-transform hover:scale-105">
          <span class="mb-3 text-red-500 text-4xl md:text-5xl">📤</span>
          <h3 class="text-lg font-bold text-red-800 mb-1">Resubmission Requested</h3>
          <p class="text-2xl md:text-3xl font-extrabold text-red-900">{{ $pendingResubmissions }}</p>
        </div>
      </div>
      <div class="mt-6 md:mt-8">
        <a href="{{ route('student.uploads.index') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 md:px-8 py-2 md:py-3 rounded-xl shadow-lg font-bold text-base md:text-lg hover:scale-105 transition-all">My Documents</a>
      </div>
    </div>
  </main>
</div>
@endsection
