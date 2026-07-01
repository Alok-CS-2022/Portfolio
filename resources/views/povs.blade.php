<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POV - {{ $settings['name'] ?? 'Portfolio' }}</title>

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

        <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Thoughts & Notes</p>
        <h1 class="font-serif text-4xl md:text-5xl font-black mb-10">My POV</h1>

        @if($povs->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($povs as $index => $pov)
            <a href="{{ route('povs.show', $pov) }}" class="border border-black p-5 flex flex-col hover:bg-white/40 transition-colors">
                <div class="flex items-center gap-3 mb-3">
                    <span class="font-mono text-xs text-[#5a7a00]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="w-2 h-2 rounded-full bg-[#8db800]"></span>
                </div>
                <h3 class="font-serif text-xl font-bold mb-2">{{ $pov->title }}</h3>
                <p class="text-sm text-gray-700 line-clamp-3 flex-grow">{{ Str::limit($pov->content, 140) }}</p>
                <span class="font-mono text-xs uppercase tracking-widest text-[#5a7a00] mt-4">Read &rarr;</span>
            </a>
            @endforeach
        </div>
        @else
            <p class="font-mono text-sm text-gray-500">No POVs yet.</p>
        @endif
    </main>

    @include('partials.footer')

</body>
</html>
