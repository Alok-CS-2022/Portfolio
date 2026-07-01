<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - {{ $settings['name'] ?? 'Portfolio' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: #f5f0e8;
            color: #111;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="min-h-screen">

    @include('partials.navbar')

    <main class="max-w-5xl mx-auto px-6 py-16">
        <a href="{{ route('home') }}" class="font-mono text-xs uppercase tracking-widest text-[#5a7a00] hover:text-black mb-6 inline-block">&larr; Back home</a>

        <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// All Work</p>
        <h1 class="font-serif text-4xl md:text-5xl font-black mb-10">Projects</h1>

        @if($featuredProject)
        <div class="border border-black p-6 mb-10 bg-white/40">
            <div class="flex flex-col md:flex-row gap-6">
                @if($featuredProject->thumbnail_path)
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $featuredProject->thumbnail_path) }}"
                         alt="{{ $featuredProject->title }}"
                         class="w-full h-64 object-cover border border-black">
                </div>
                @endif
                <div class="md:w-1/2 flex flex-col justify-center">
                    <span class="inline-block font-mono text-xs uppercase tracking-widest border border-[#8db800] text-[#5a7a00] px-2 py-1 w-fit mb-3">
                        Featured
                    </span>
                    <h2 class="font-serif text-2xl font-bold mb-2">{{ $featuredProject->title }}</h2>
                    <p class="text-sm mb-4">{{ $featuredProject->description }}</p>

                    @if($featuredProject->tech_stack)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($featuredProject->tech_stack as $tech)
                            <span class="font-mono text-[10px] uppercase tracking-wide border border-black px-2 py-0.5">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div class="flex gap-4 font-mono text-xs uppercase tracking-widest">
                        @if($featuredProject->live_url)
                            <a href="{{ $featuredProject->live_url }}" target="_blank" class="border-b border-[#8db800] text-[#5a7a00] hover:text-black">Live &rarr;</a>
                        @endif
                        @if($featuredProject->github_url)
                            <a href="{{ $featuredProject->github_url }}" target="_blank" class="border-b border-black hover:text-[#5a7a00]">Code &rarr;</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($projects->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($projects as $index => $project)
            <div class="border border-black p-4 flex flex-col">
                <span class="font-mono text-xs text-[#5a7a00] mb-2">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

                @if($project->thumbnail_path)
                <img src="{{ asset('storage/' . $project->thumbnail_path) }}"
                     alt="{{ $project->title }}"
                     class="w-full h-32 object-cover border border-black mb-3">
                @endif

                <h3 class="font-serif text-lg font-bold mb-1.5">{{ $project->title }}</h3>
                <p class="text-sm mb-3 flex-grow">{{ $project->description }}</p>

                @if($project->tech_stack)
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->tech_stack as $tech)
                        <span class="font-mono text-[10px] uppercase tracking-wide border border-black px-2 py-0.5">{{ $tech }}</span>
                    @endforeach
                </div>
                @endif

                <div class="flex gap-4 font-mono text-xs uppercase tracking-widest mt-auto">
                    @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="border-b border-[#8db800] text-[#5a7a00] hover:text-black">Live &rarr;</a>
                    @endif
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="border-b border-black hover:text-[#5a7a00]">Code &rarr;</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
            <p class="font-mono text-sm text-gray-500">No other projects yet.</p>
        @endif
    </main>

    @include('partials.footer')

</body>
</html>
