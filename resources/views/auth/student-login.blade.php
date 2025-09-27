
@extends('layouts.app')
@section('title','Student Login')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-2xl p-4 sm:p-6 md:p-10 max-w-full md:max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-green-600"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /></svg>
      Student Login
    </h2>
    @if($errors->any())
      <div class="bg-red-100 border border-red-200 p-3 rounded mb-4 text-red-800">
        <ul class="list-disc pl-5">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  <form action="{{ route('student.login.post') }}" method="post" class="space-y-6" aria-label="Student Login Form">
      @csrf
      <div>
        <label for="matric_no" class="block text-sm font-semibold mb-2">Matric No</label>
        <div class="relative">
          <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5" /></svg>
          </span>
          <input id="matric_no" name="matric_no" class="w-full border p-3 rounded-xl pl-10" value="{{ old('matric_no') }}" required aria-required="true" aria-label="Matriculation Number">
          @error('matric_no')
            <span class="text-red-600 text-xs">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="relative">
        <label for="student_password" class="block text-sm font-semibold mb-2">Password</label>
        <input id="student_password" type="password" name="password" class="w-full border p-3 rounded-xl" required aria-required="true" aria-label="Password">
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeStudent" onclick="togglePassword('student_password','eyeStudent')" title="Show/Hide Password" aria-label="Show or hide password">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
        </button>
        @error('password')
          <span class="text-red-600 text-xs block mt-1">{{ $message }}</span>
        @enderror
      </div>
      <div class="flex flex-col gap-2">
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection
