@extends('layouts.app')
@section('title','Re-upload Document')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-blue-100 flex items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl p-10 max-w-xl w-full border border-green-100">
    <h3 class="text-2xl font-bold text-green-700 mb-6">Re-upload Document</h3>
    <div class="mb-4 text-gray-700">Current file: <span class="font-semibold">{{ $doc->original_filename }}</span></div>
    @if($errors->any())
      <div class="mb-4 text-red-700 bg-red-100 border border-red-200 p-3 rounded">
        <ul class="list-disc pl-5 text-left">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {{-- Notifications are now handled globally by the toast component in the layout --}}
    <form x-data="uploadForm()" @submit.prevent="uploadFile" class="space-y-6" aria-label="Re-upload Document Form">
      @csrf
      <div>
        <label for="file" class="block text-sm font-semibold mb-2">Choose new file (pdf/jpg/png - max 10MB)</label>
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
      </div>
      <!-- Progress Bar -->
      <div x-show="progress > 0" class="w-full bg-gray-200 rounded-full h-3 mb-4">
        <div :style="'width: ' + progress + '%'" class="bg-green-500 h-3 rounded-full transition-all" x-text="progress + '%'" style="min-width: 2rem;"></div>
      </div>
      <div class="flex justify-center gap-4">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-bold text-lg hover:scale-105 transition-all flex items-center gap-2" aria-label="Re-upload Document" :disabled="uploading">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-8m0 0l-3 3m3-3l3 3"/></svg>
          <span x-show="!uploading">Re-upload</span>
          <span x-show="uploading">Uploading...</span>
        </button>
        <a href="{{ route('student.uploads.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl shadow font-semibold text-lg hover:bg-gray-200 transition-all flex items-center gap-2" aria-label="Back to My Documents">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
          Back
        </a>
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
</div>
@endsection
