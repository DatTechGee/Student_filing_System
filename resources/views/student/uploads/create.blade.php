
@extends('layouts.app')
@section('title','Upload Document')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex">
  <!-- Sidebar -->
  <aside class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl">
    <div>
      <div class="p-8 border-b">
        <span class="text-2xl font-bold text-green-700">Student Panel</span>
      </div>
      <nav class="mt-8 flex flex-col gap-2 px-8">
        <a href="{{ route('student.dashboard') }}" class="py-3 px-4 rounded hover:bg-green-100 flex items-center gap-2">
          <span class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6"/></svg>
          </span> Dashboard
        </a>
        <a href="{{ route('student.uploads.index') }}" class="py-3 px-4 rounded bg-green-100 font-semibold text-green-700 flex items-center gap-2">
          <span class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 12v4m0 0l-2-2m2 2l2-2"/></svg>
          </span> My Documents
        </a>
      </nav>
    </div>
    <div class="p-8 border-t">
      <span class="text-xs text-gray-400">Upload Document</span>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="flex-1 flex flex-col items-center justify-center p-10 animate-site-fade-in">
    <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-xl w-full border border-green-100">
      <h3 class="text-2xl font-bold text-green-700 mb-6">Upload: {{ $requirement->name }}</h3>
      @if($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
          <ul class="list-disc pl-5 text-left">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  <form x-data="uploadForm()" @submit.prevent="uploadFile" class="space-y-6" aria-label="Upload Document Form" enctype="multipart/form-data">
        @csrf
        <div>
          <label for="file" class="block text-sm font-semibold mb-2">Choose file (pdf, jpg, jpeg, png - max 10MB)</label>
          <input id="file" type="file" name="file" class="w-full border p-3 rounded mb-4" required aria-required="true" aria-label="Document file" @change="previewFile">
          @error('file')
            <div class="bg-red-100 border border-red-200 p-2 rounded text-red-800 text-sm mt-2">{{ $message }}</div>
          @enderror
          <!-- Preview -->
          <template x-if="previewUrl">
            <div class="mb-4">
              <template x-if="isImage">
                <img :src="previewUrl" alt="Image preview" class="max-h-48 mx-auto rounded shadow border mb-2">
              </template>
              <template x-if="isPDF">
                <iframe :src="previewUrl" class="w-full h-48 border rounded" frameborder="0"></iframe>
              </template>
            </div>
          </template>
          <template x-if="errorMsg">
            <div class="bg-red-100 border border-red-200 p-2 rounded text-red-800 text-sm mb-2" x-text="errorMsg"></div>
          </template>
        </div>
        <!-- Progress Bar -->
        <div x-show="progress > 0" class="w-full bg-gray-200 rounded-full h-3 mb-4">
          <div :style="'width: ' + progress + '%'" class="bg-green-500 h-3 rounded-full transition-all" x-text="progress + '%'" style="min-width: 2rem;"></div>
        </div>
        <div class="flex justify-center gap-4">
          <button type="submit" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all" aria-label="Upload Document" :disabled="uploading">
            <span x-show="!uploading">Upload</span>
            <span x-show="uploading">Uploading...</span>
          </button>
          <a href="{{ route('student.uploads.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold text-lg hover:bg-gray-200 transition-all" aria-label="Back to My Documents">Back</a>
        </div>
      </form>
      <script>
      function uploadForm() {
        return {
          progress: 0,
          uploading: false,
          previewUrl: '',
          isImage: false,
          isPDF: false,
          errorMsg: '',
          previewFile(e) {
            const file = e.target.files[0];
            if (!file) return;
            const type = file.type;
            this.isImage = type.startsWith('image/');
            this.isPDF = type === 'application/pdf';
            if (this.isImage || this.isPDF) {
              const reader = new FileReader();
              reader.onload = (ev) => { this.previewUrl = ev.target.result; };
              reader.readAsDataURL(file);
            } else {
              this.previewUrl = '';
            }
          },
          uploadFile(e) {
            const form = e.target.closest('form');
            const fileInput = form.querySelector('input[type=file]');
            const file = fileInput.files[0];
            if (!file) { form.submit(); return; }
            this.uploading = true;
            const data = new FormData(form);
            fetch(form.action, {
              method: 'POST',
              headers: { 'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value },
              body: data,
            }).then(response => {
              if (response.redirected) { window.location = response.url; return; }
              return response.text();
            })
            .finally(() => { this.uploading = false; this.progress = 0; })
            .catch(() => { this.uploading = false; });
          },
        };
      }
      </script>
    </div>
  </main>
</div>
@endsection
