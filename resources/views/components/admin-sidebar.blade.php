@props(['title' => 'Admin Panel'])

@php
$links = [
    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4.5 10.5v9a1.5 1.5 0 001.5 1.5h3.75m6 0h3.75a1.5 1.5 0 001.5-1.5v-9M9 21h6"/>', 'color' => 'green'],
    ['route' => 'faculties.index', 'label' => 'Faculties', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/><rect width="20" height="12" x="2" y="6" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/>', 'color' => 'blue'],
    ['route' => 'departments.index', 'label' => 'Departments', 'icon' => '<rect width="16" height="12" x="4" y="8" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 8V6a2 2 0 012-2h12a2 2 0 012 2v2"/>', 'color' => 'purple'],
    ['route' => 'document-requirements.index', 'label' => 'Requirements', 'icon' => '<rect width="16" height="20" x="4" y="2" rx="2" stroke="currentColor" stroke-width="1.5" fill="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 6h8M8 10h8M8 14h4"/>', 'color' => 'emerald'],
    ['route' => 'students.bulk_upload', 'label' => 'Bulk Upload', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>', 'color' => 'amber'],
    ['route' => 'admin.uploads.index', 'label' => 'Uploads', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>', 'color' => 'amber'],
    ['route' => 'students.index', 'label' => 'Students', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25v-1.5A2.25 2.25 0 016.75 16.5h10.5a2.25 2.25 0 012.25 2.25v1.5"/>', 'color' => 'indigo'],
    ['route' => 'admin.settings', 'label' => 'Settings', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>', 'color' => 'gray'],
];
@endphp

<div class="admin-sidebar bg-white border-r border-gray-200 flex flex-col h-full" x-data="{ collapsed: false }">
    <div class="p-5 border-b border-gray-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                </svg>
            </div>
            <span x-show="!collapsed" x-transition class="text-sm font-bold text-gray-800 tracking-tight">{{ $title }}</span>
        </div>
        <button @click="collapsed = !collapsed" class="hidden lg:flex items-center justify-center w-7 h-7 rounded-lg hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors" :title="collapsed ? 'Expand' : 'Collapse'">
            <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
            <svg x-show="collapsed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </button>
    </div>

    <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
        @foreach($links as $link)
            <a href="{{ route($link['route']) }}"
               class="sidebar-link group flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150
                      {{ request()->routeIs($link['route'] . '*') || request()->routeIs($link['route'])
                         ? 'bg-gradient-to-r from-' . $link['color'] . '-50 to-' . $link['color'] . '-100 text-' . $link['color'] . '-700 shadow-sm'
                         : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                <span class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center transition-colors
                             {{ request()->routeIs($link['route'] . '*') || request()->routeIs($link['route'])
                                ? 'bg-' . $link['color'] . '-100 text-' . $link['color'] . '-600'
                                : 'text-gray-400 group-hover:text-gray-600 group-hover:bg-gray-100' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">{!! $link['icon'] !!}</svg>
                </span>
                <span x-show="!collapsed" x-transition>{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="p-3 border-t border-gray-100">
        <a href="{{ route('admin.logout') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-red-50 hover:text-red-600 transition-all duration-150">
            <span class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 group-hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>
            </span>
            <span x-show="!collapsed" x-transition>Logout</span>
        </a>
    </div>
</div>
