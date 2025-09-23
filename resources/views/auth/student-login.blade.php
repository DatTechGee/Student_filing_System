
@extends('layouts.app')
@section('title','Student Login')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8">Student Login</h2>
    <form action="{{ route('student.login.post') }}" method="post" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-2">Matric No</label>
        <input name="matric_no" class="w-full border p-3 rounded-xl" value="{{ old('matric_no') }}" required>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold mb-2">Password</label>
        <input id="student_password" type="password" name="password" class="w-full border p-3 rounded-xl" required>
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeStudent" onclick="togglePassword('student_password','eyeStudent')">👁️</button>
      </div>
      <div class="flex flex-col gap-2">
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Login</button>
        <a href="{{ route('student.change_password') }}" class="text-sm text-green-700 underline">Change password</a>
      </div>
    </form>
  </div>
</div>
@endsection
