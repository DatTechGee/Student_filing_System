
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
      </div>
      <div>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection
