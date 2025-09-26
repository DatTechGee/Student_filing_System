<div x-data="{ open: false, mini: false }" class="relative">
    <!-- Mobile toggle button -->
    <button @click="open = !open" class="md:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-2 rounded shadow focus:outline-none" aria-label="Open sidebar" aria-controls="sidebarNav" :aria-expanded="open.toString()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 6h16.5m-16.5 6h16.5" />
        </svg>
    </button>
    <!-- Overlay for mobile -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-30 z-40 md:hidden" x-cloak aria-hidden="true"></div>
    <!-- Sidebar -->
    <aside id="sidebarNav"
        :class="{
            'translate-x-0': open,
            '-translate-x-full': !open,
            'md:w-20': mini,
            'md:w-72': !mini
        }"
        class="w-72 bg-white shadow-2xl flex flex-col justify-between rounded-r-3xl fixed top-0 left-0 h-full z-50 transform transition-transform duration-200 ease-in-out md:static md:translate-x-0 md:h-auto md:flex md:w-72"
        role="navigation" aria-label="Sidebar Navigation" tabindex="0">
        <!-- Collapse/Expand button for desktop -->
        <button @click="mini = !mini" class="hidden md:block absolute top-4 right-4 z-50 bg-gray-200 text-gray-700 p-2 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-green-500" :aria-label="mini ? 'Expand sidebar' : 'Collapse sidebar'">
            <svg x-show="!mini" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5" />
            </svg>
            <svg x-show="mini" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>
        </button>
        <!-- Close button for mobile -->
        <button @click="open = false" class="md:hidden absolute top-4 right-4 z-50 bg-gray-200 text-gray-700 p-2 rounded-full shadow focus:outline-none focus:ring-2 focus:ring-green-500" aria-label="Close sidebar" x-show="open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div>
            <div :class="mini ? 'p-4 border-b flex justify-center' : 'p-8 border-b'">
                <span :class="mini ? 'text-xl font-bold text-green-700' : 'text-2xl font-bold text-green-700'">
                    <template x-if="!mini">
                        <span>{{ $title ?? 'Student Panel' }}</span>
                    </template>
                    <template x-if="mini">
                        <span>
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-8 h-8 text-green-700'><path stroke-linecap='round' stroke-linejoin='round' d='M12 3l9 4.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9L12 3z' /><path stroke-linecap='round' stroke-linejoin='round' d='M9 21h6' /></svg>
                        </span>
                    </template>
                </span>
            </div>
            <nav :class="mini ? 'mt-8 flex flex-col gap-2 px-2 items-center' : 'mt-8 flex flex-col gap-2 px-8'" aria-label="Sidebar Links">
                <template x-if="!mini">
                    <div>
                        {{ $slot }}
                    </div>
                </template>
                <template x-if="mini">
                    <div>
                        <!-- Only show icons in mini mode. You may want to update your slot content to support this. -->
                        <template x-for="el in $el.parentElement.querySelectorAll('a')">
                            <span x-html="el.querySelector('svg') ? el.querySelector('svg').outerHTML : ''"></span>
                        </template>
                    </div>
                </template>
            </nav>
        </div>
        <div :class="mini ? 'p-4 border-t flex justify-center' : 'p-8 border-t'">
            <span :class="mini ? 'text-xs text-gray-400' : 'text-xs text-gray-400'">
                <template x-if="!mini">
                    <span>{{ $footer ?? 'Uploads' }}</span>
                </template>
                <template x-if="mini">
                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-5 h-5 text-gray-400'><path stroke-linecap='round' stroke-linejoin='round' d='M12 3l9 4.5v9a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 16.5v-9L12 3z' /><path stroke-linecap='round' stroke-linejoin='round' d='M9 21h6' /></svg>
                </template>
            </span>
        </div>
    </aside>
</div>
<!-- Alpine.js for sidebar toggle -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
