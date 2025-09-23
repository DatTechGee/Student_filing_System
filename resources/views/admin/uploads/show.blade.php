@extends('layouts.app')
@section('title','Student Document Uploads')
@section('content')
<!-- Tailwind CSS is loaded via app.css for production build -->
<div class="flex flex-col min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 items-center justify-center">
  <div class="bg-white p-4 md:p-8 rounded-2xl shadow-2xl max-w-xl w-full border border-green-100">
    <h2 class="text-2xl md:text-3xl font-bold text-green-700 mb-4 md:mb-6">Uploads for {{ $student->first_name }} {{ $student->last_name }}</h2>
    <ul class="mb-4 md:mb-6">
      @forelse($documents as $doc)
        <li class="mb-4 flex items-center justify-between border-b pb-2">
          <div>
            <span class="font-semibold text-gray-700">{{ $doc->requirement->name ?? 'Document' }}</span>
            <span class="ml-2 text-gray-500">{{ $doc->original_filename ?? 'No file' }}</span>
            @if($doc->resubmission_requested)
              <span class="ml-2 text-xs text-red-600 font-bold">Resubmission Requested</span>
            @endif
          </div>
          <div class="flex items-center gap-2">
            <span class="text-xs text-gray-400">{{ $doc->created_at->format('d M Y, h:i A') }}</span>
            <form action="{{ route('admin.uploads.request_resubmission', $doc->id) }}" method="post" onsubmit="return confirm('Request resubmission for this document?');" style="display:inline;">
              @csrf
              <button class="bg-red-100 text-red-700 px-3 py-1 rounded text-xs font-semibold hover:bg-red-200 transition-all" type="submit">Request Resubmission</button>
            </form>
            @if($doc->resubmission_requested)
            <form action="{{ route('admin.uploads.cancel_resubmission', $doc->id) }}" method="post" onsubmit="return confirm('Cancel resubmission request for this document?');" style="display:inline;">
              @csrf
              <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded text-xs font-semibold hover:bg-gray-300 transition-all" type="submit">Cancel Resubmission</button>
            </form>
            @endif
            <a href="{{ route('admin.uploads.details', $doc->id) }}" class="bg-blue-100 text-blue-700 px-3 py-1 rounded text-xs font-semibold hover:bg-blue-200 transition-all">Details</a>
          </div>
        </li>
      @empty
        <li class="text-red-600">No documents uploaded.</li>
      @endforelse
    </ul>
    <a href="{{ route('admin.uploads.index') }}" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-xl shadow font-bold hover:scale-105 transition-all inline-block">Back to Uploads</a>
  </div>
</div>
@endsection
