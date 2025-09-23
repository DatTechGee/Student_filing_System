@extends('layouts.app')
@section('title','Admin Settings')
@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-md w-full border border-green-100">
    <h2 class="text-3xl font-bold text-green-700 mb-8">Admin Settings</h2>
    @if(session('success'))
      <div class="bg-green-100 border border-green-200 p-3 rounded mb-4 text-green-800">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.settings.update') }}" method="post" class="space-y-6">
      @csrf
      @method('PUT')
      <div>
        <label class="block text-sm font-semibold mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="w-full border p-3 rounded-xl" required>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-2">New Password</label>
        <input type="password" name="password" class="w-full border p-3 rounded-xl">
      </div>
      <div>
        <label class="block text-sm font-semibold mb-2">Confirm New Password</label>
        <input type="password" name="password_confirmation" class="w-full border p-3 rounded-xl">
      </div>
      <div>
        <button class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all w-full">Update Settings</button>
      </div>
    </form>
  </div>
</div>
@endsection
