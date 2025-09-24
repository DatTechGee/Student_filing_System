
@extends('layouts.app')
@section('title','Admin Login')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8">Admin Login</h2>
    <form action="{{ route('admin.login.post') }}" method="post" class="space-y-6">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-2">Username</label>
        <input name="username" class="w-full border p-3 rounded-xl" value="{{ old('username') }}" required>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold mb-2">Password</label>
        <input id="admin_password" type="password" name="password" class="w-full border p-3 rounded-xl" required>
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeAdmin" onclick="togglePassword('admin_password','eyeAdmin')">👁️</button>
    <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeAdmin" onclick="togglePassword('admin_password','eyeAdmin')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5" /></svg></button>
      </div>
      <div>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection
