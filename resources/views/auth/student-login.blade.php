
@extends('layouts.app')
@section('title','Student Login')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /></svg>
      Student Login
    </h2>
    <form action="{{ route('student.login.post') }}" method="post" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-2">Matric No</label>
        <div class="relative">
          <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5" /></svg>
          </span>
          <input name="matric_no" class="w-full border p-3 rounded-xl pl-10" value="{{ old('matric_no') }}" required>
        </div>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold mb-2">Password</label>
        <input id="student_password" type="password" name="password" class="w-full border p-3 rounded-xl" required>
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeStudent" onclick="togglePassword('student_password','eyeStudent')" title="Show/Hide Password">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
        </button>
      </div>
      <div class="flex flex-col gap-2">
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection
