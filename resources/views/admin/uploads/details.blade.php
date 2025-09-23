@extends('layouts.app')
@section('title','Document Details')
@section('content')
<div class="flex min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 items-center justify-center">
  <div class="bg-white p-6 md:p-10 rounded-2xl shadow-2xl max-w-lg w-full border border-green-100">
    <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-4 md:mb-6">Document Details</h2>
    <div class="mb-4">
      <div class="font-semibold text-lg">Requirement:</div>
      <div class="text-gray-700">{{ $doc->requirement->name ?? 'N/A' }}</div>
    </div>
    <div class="mb-4">
      <div class="font-semibold text-lg">Student:</div>
      <div class="text-gray-700">{{ $doc->student->first_name ?? '' }} {{ $doc->student->last_name ?? '' }} ({{ $doc->student->matric_no ?? '' }})</div>
    </div>
    <div class="mb-4">
      <div class="font-semibold text-lg">Original Filename:</div>
      <div class="text-gray-700">{{ $doc->original_filename }}</div>
    </div>
    <div class="mb-4">
      <div class="font-semibold text-lg">Uploaded At:</div>
      <div class="text-gray-700">{{ $doc->uploaded_at }}</div>
    </div>
    <div class="mb-4">
      <div class="font-semibold text-lg">Resubmission Requested:</div>
      <div class="text-gray-700">{{ $doc->resubmission_requested ? 'Yes' : 'No' }}</div>
    </div>
    <div class="flex gap-4 mt-6">
      <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow font-bold hover:bg-blue-700 transition-all">View File</a>
      <a href="{{ route('student.uploads.download', $doc->id) }}" class="bg-green-600 text-white px-6 py-3 rounded-xl shadow font-bold hover:bg-green-700 transition-all">Download</a>
      <a href="{{ url()->previous() }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold hover:bg-gray-200 transition-all">Back</a>
    </div>
  </div>
</div>
@endsection
