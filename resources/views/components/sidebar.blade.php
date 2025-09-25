<div x-data="{ open: false }" class="relative">
    <!-- Mobile toggle button -->
    <button @click="open = !open" class="md:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-2 rounded shadow focus:outline-none" aria-label="Open sidebar" aria-controls="sidebarNav" :aria-expanded="open.toString()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 6h16.5m-16.5 6h16.5" />
        </svg>
    </button>
    <!-- Overlay for mobile -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-30 z-40 md:hidden" x-cloak aria-hidden="true"></div>
    <!-- Sidebar -->
    <aside id="sidebarNav" :class="{'translate-x-0': open, '-translate-x-full': !open}" class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl fixed top-0 left-0 h-full z-50 transform transition-transform duration-200 ease-in-out md:static md:translate-x-0 md:h-auto md:flex md:w-72" role="navigation" aria-label="Sidebar Navigation" tabindex="0">
        <div>
            <div class="p-8 border-b">
                <span class="text-2xl font-bold text-green-700">
                    {{ $title ?? 'Student Panel' }}
                </span>
            </div>
            <nav class="mt-8 flex flex-col gap-2 px-8" aria-label="Sidebar Links">
                <!--
                Example usage for accessible links:
                <a href="#" class="block px-4 py-2 rounded hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500" aria-current="page">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500">Documents</a>
                -->
                {{ $slot }}
            </nav>
        </div>
        <div class="p-8 border-t">
            <span class="text-xs text-gray-400">{{ $footer ?? 'Uploads' }}</span>
        </div>
    </aside>
</div>
<!-- Alpine.js for sidebar toggle -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
