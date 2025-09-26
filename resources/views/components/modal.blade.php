<div x-data="{ open: @entangle($attributes->wire('model')).defer ?? false }" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity" x-cloak>
    <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl p-8 max-w-lg w-full relative animate-fade-in">
        <!-- Close button -->
        <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-full p-2" aria-label="Close modal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <!-- Modal content slot -->
        <div class="space-y-4">
            {{ $slot }}
        </div>
    </div>
</div>

<style>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 0.3s ease;
}
</style>
