@props(['title' => 'Admin Panel'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title) - Student Filing System</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet"/>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        .sidebar-link.active { background: linear-gradient(to right, #ecfdf5, #d1fae5); color: #065f46; }
    </style>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('notifications', {
                notifications: [],
                loading: false,
                fetch() {
                    this.loading = true;
                    fetch('/notifications')
                        .then(r => r.json())
                        .then(data => {
                            this.notifications = (data.notifications || []).map(n => ({
                                id: n.id,
                                message: typeof n.data === 'string' ? n.data : (n.data.message || ''),
                                time: n.created_at ? new Date(n.created_at).toLocaleString() : '',
                                read: !!n.read_at
                            }));
                            this.loading = false;
                        })
                        .catch(() => { this.loading = false; });
                },
                markAsRead(id) {
                    fetch(`/notifications/${id}/read`, {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content }
                    }).then(() => {
                        const note = this.notifications.find(n => n.id === id);
                        if (note) note.read = true;
                    });
                }
            });
            Alpine.store('notifications').fetch();
            setInterval(() => Alpine.store('notifications').fetch(), 30000);
        });
    </script>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800 antialiased">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="flex min-h-screen">
        {{-- Mobile overlay --}}
        <div x-data="{ sidebarOpen: false }" class="contents">
            {{-- Mobile hamburger --}}
            <button @click="sidebarOpen = true" class="lg:hidden fixed top-4 left-4 z-50 bg-white border border-gray-200 rounded-lg p-2 shadow-sm hover:bg-gray-50 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>

            {{-- Mobile overlay --}}
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-40 lg:hidden backdrop-blur-sm" x-cloak></div>

            {{-- Sidebar --}}
            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
                   class="fixed lg:sticky top-0 left-0 z-50 lg:z-auto w-64 h-screen flex-shrink-0 transform transition-transform duration-300 ease-in-out bg-white border-r border-gray-200">
                <x-admin-sidebar title="Admin Panel"/>
            </aside>

            {{-- Main content --}}
            <div class="flex-1 min-w-0 flex flex-col">
                {{-- Top bar --}}
                <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-gray-200">
                    <div class="flex items-center justify-between px-6 py-3">
                        <div class="flex items-center gap-3">
                            <div class="lg:hidden w-8"></div>
                            <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="flex items-center gap-3">
                            {{-- Notifications --}}
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open; if(open) $store.notifications.fetch()" class="relative p-2 rounded-lg hover:bg-gray-100 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                                    </svg>
                                    <template x-if="$store.notifications.notifications.filter(n => !n.read).length > 0">
                                        <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 rounded-full text-[10px] text-white flex items-center justify-center font-bold" x-text="$store.notifications.notifications.filter(n => !n.read).length"></span>
                                    </template>
                                </button>
                                <div x-show="open" @click.away="open = false" x-cloak x-transition
                                     class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
                                    <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between">
                                        <span class="text-sm font-semibold text-gray-700">Notifications</span>
                                        <button @click="$store.notifications.fetch()" class="text-xs text-green-600 hover:text-green-700 font-medium">Refresh</button>
                                    </div>
                                    <div class="max-h-64 overflow-y-auto">
                                        <template x-if="$store.notifications.notifications.length === 0">
                                            <div class="px-4 py-8 text-center text-sm text-gray-400">No notifications</div>
                                        </template>
                                        <template x-for="n in $store.notifications.notifications" :key="n.id">
                                            <div @click="$store.notifications.markAsRead(n.id)"
                                                 class="px-4 py-3 border-b border-gray-50 hover:bg-gray-50 cursor-pointer transition-colors"
                                                 :class="n.read ? 'opacity-60' : ''">
                                                <p class="text-sm text-gray-700" x-text="n.message"></p>
                                                <p class="text-xs text-gray-400 mt-1" x-text="n.time"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                {{-- Page content --}}
                <main class="flex-1 p-4 md:p-6 lg:p-8 animate-fade-in">
                    @if(session('success'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                             class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                            <button @click="show = false" class="ml-auto text-green-400 hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                             class="mb-6 flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                            </svg>
                            <span class="text-sm font-medium">{{ session('error') }}</span>
                            <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    @endif
                    @yield('content')
                </main>

                {{-- Footer --}}
                <footer class="border-t border-gray-200 px-6 py-3 bg-white">
                    <p class="text-xs text-gray-400 text-center">Student Filing System &copy; {{ date('Y') }}</p>
                </footer>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.3s ease-out; }
    </style>
</body>
</html>
