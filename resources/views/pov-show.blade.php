<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pov->title }} - {{ $settings['name'] ?? 'Portfolio' }}</title>

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

    <main class="max-w-3xl mx-auto px-6 py-16">
        <a href="{{ route('povs.index') }}" class="font-mono text-xs uppercase tracking-widest text-[#5a7a00] hover:text-black mb-6 inline-block">&larr; Back to POV</a>

        <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Thoughts & Notes</p>
        <h1 class="font-serif text-4xl md:text-5xl font-black mb-8">{{ $pov->title }}</h1>

        <div class="border-t border-black pt-8">
            <p class="text-base leading-relaxed whitespace-pre-line">{{ $pov->content }}</p>
        </div>
    </main>

    @include('partials.footer')

</body>
</html>
