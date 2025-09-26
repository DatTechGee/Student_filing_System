<div x-data="{ show: @entangle($attributes->wire('model')).defer ?? true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-6 right-6 z-50 max-w-xs w-full">
    <div class="flex items-center bg-white border border-green-200 rounded-xl shadow-lg px-4 py-3 space-x-3 animate-notification-fade-in">
        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
        </span>
        <div class="flex-1 text-green-800 text-sm font-semibold">
            {{ $slot }}
        </div>
        <button @click="show = false" class="ml-2 text-gray-400 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-full p-1" aria-label="Close notification">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>
</div>
