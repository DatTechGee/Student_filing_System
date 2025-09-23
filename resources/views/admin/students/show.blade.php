@extends('layouts.app')
@section('title','Student Details')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-semibold text-green-700 mb-4">Student Details</h2>
  <div class="mb-2"><strong>Matric No:</strong> {{ $student->matric_no }}</div>
  <div class="mb-2"><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</div>
  <div class="mb-2"><strong>Faculty ID:</strong> {{ $student->faculty_id }}</div>
  <div class="mb-2"><strong>Department ID:</strong> {{ $student->department_id }}</div>
  <div class="mb-2"><strong>Session:</strong> {{ $student->session }}</div>
</div>
@endsection
