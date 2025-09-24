@extends('layouts.app')
@section('title','Change Password')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8">Change Password</h2>
    @if(session('error'))
      <div class="bg-red-100 border border-red-200 p-3 rounded mb-4 text-red-800">{{ session('error') }}</div>
    @endif
    @if(session('success'))
      <div class="bg-green-100 border border-green-200 p-3 rounded mb-4 text-green-800">{{ session('success') }}</div>
    @endif
    @if(session('info'))
      <div class="bg-blue-100 border border-blue-200 p-3 rounded mb-4 text-blue-800">{{ session('info') }}</div>
    @endif
    <form action="{{ route('student.change_password.post') }}" method="post" class="space-y-6">
      @csrf
      <div class="relative">
        <label class="block text-sm font-semibold mb-2">Current Password</label>
        <input id="current_password" type="password" name="current_password" class="w-full border p-3 rounded-xl" required>
        
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeCurrent" onclick="togglePassword('current_password','eyeCurrent')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
        </button>
      </div>
      <div class="relative">
        <label class="block text-sm font-semibold mb-2">New Password</label>
        <input id="new_password" type="password" name="password" class="w-full border p-3 rounded-xl" required>
        
        <button type="button" class="absolute right-3 top-10 text-gray-500" id="eyeNew" onclick="togglePassword('new_password','eyeNew')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" /><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
        </button>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-2">Confirm New Password</label>
        <input type="password" name="password_confirmation" class="w-full border p-3 rounded-xl" required>
      </div>
      <div>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Change Password</button>
      </div>
    </form>
  </div>
</div>
@endsection
