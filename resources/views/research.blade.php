<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research - {{ $settings['name'] ?? 'Portfolio' }}</title>

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

        <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Research Log</p>
        <h1 class="font-serif text-4xl md:text-5xl font-black mb-10">Research</h1>

        @if($research->count() > 0)
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($research as $index => $item)
            <div class="border border-black p-4 flex flex-col">
                <div class="flex items-start gap-3 mb-3">
                    <span class="font-mono text-xs text-[#5a7a00] mt-1">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="w-2 h-2 rounded-full bg-[#8db800] mt-1.5 flex-shrink-0"></span>
                </div>

                @if($item->thumbnail_path)
                <img src="{{ asset('storage/' . $item->thumbnail_path) }}"
                     alt="{{ $item->title }}"
                     class="w-full h-32 object-cover border border-black mb-3">
                @endif

                <h3 class="font-serif text-lg font-bold mb-1.5">
                    @if($item->link)
                        <a href="{{ $item->link }}" target="_blank" class="hover:text-[#5a7a00]">{{ $item->title }}</a>
                    @else
                        {{ $item->title }}
                    @endif
                </h3>
                <p class="text-sm mb-3 flex-grow">{{ $item->description }}</p>

                @if($item->link)
                <a href="{{ $item->link }}" target="_blank"
                   class="font-mono text-xs uppercase tracking-widest border-b border-[#8db800] text-[#5a7a00] hover:text-black w-fit">
                    Visit &rarr;
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @else
            <p class="font-mono text-sm text-gray-500">No research entries yet.</p>
        @endif
    </main>

    @include('partials.footer')

</body>
</html>
