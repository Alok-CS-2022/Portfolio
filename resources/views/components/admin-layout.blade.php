<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-20 md:hidden" x-cloak></div>

        <aside
            class="fixed md:static inset-y-0 left-0 z-30 w-64 bg-gray-900 text-white transform transition-transform duration-200 ease-in-out md:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        >
            <div class="p-4 border-b border-gray-700 flex items-center justify-between">
                <span class="font-bold text-lg">Admin Panel</span>
                <button @click="sidebarOpen = false" class="md:hidden text-gray-400">&times;</button>
            </div>

            <nav class="p-4 space-y-1">
                @php
                    $links = [
                        ['route' => 'admin.projects.index', 'label' => 'Projects', 'count' => \App\Models\Project::count()],
                        ['route' => 'admin.experiences.index', 'label' => 'Experience', 'count' => \App\Models\Experience::count()],
                        ['route' => 'admin.research.index', 'label' => 'Research', 'count' => \App\Models\Research::count()],
                        ['route' => 'admin.povs.index', 'label' => 'POV', 'count' => \App\Models\Pov::count()],
                        ['route' => 'admin.settings.edit', 'label' => 'Settings', 'count' => null],
                    ];
                @endphp

                @foreach($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="flex items-center justify-between px-3 py-2 rounded-md text-sm {{ request()->routeIs(str_replace('.index', '.*', $link['route'])) || request()->routeIs($link['route']) ? 'bg-gray-700 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        <span>{{ $link['label'] }}</span>
                        @if(!is_null($link['count']))
                            <span class="text-xs bg-gray-700 px-2 py-0.5 rounded-full">{{ $link['count'] }}</span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="p-4 border-t border-gray-700 mt-4">
                <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-white">&larr; View live site</a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b px-4 py-3 flex items-center justify-between md:hidden">
                <button @click="sidebarOpen = true" class="text-gray-600">&#9776;</button>
                <span class="font-semibold">Admin Panel</span>
                <span></span>
            </header>

            @isset($header)
            <div class="bg-white border-b px-6 py-4">
                {{ $header }}
            </div>
            @endisset

            <main class="flex-1 overflow-y-auto p-6">
                {{ $slot }}
            </main>
        </div>

    </div>

</body>
</html>
