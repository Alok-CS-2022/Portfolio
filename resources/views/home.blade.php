<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name") }} — Portfolio</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="font-bold text-lg">Alok Kharel</a>
            <div class="hidden md:flex items-center gap-6 text-sm">
                <a href="#projects" class="hover:text-gray-600">Projects</a>
                <a href="#about" class="hover:text-gray-600">About</a>
                <a href="#contact" class="hover:text-gray-600">Contact</a>
                <a href="#" class="hover:text-gray-600">Resume</a>
                <a href="https://github.com/Alok-CS-2022" target="_blank" class="hover:text-gray-600">GitHub</a>
                <a href="#" target="_blank" class="hover:text-gray-600">LinkedIn</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="max-w-6xl mx-auto px-6 py-24 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Alok Kharel</h1>
        <p class="text-xl text-gray-600 mb-2">Full-Stack Developer</p>
        <p class="text-gray-500 max-w-xl mx-auto mb-8">I build web applications with Laravel, PHP, and modern frontend tools.</p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <a href="#projects" class="px-6 py-3 bg-gray-900 text-white rounded-md text-sm font-medium">View Projects</a>
            <a href="#" class="px-6 py-3 border border-gray-300 rounded-md text-sm font-medium">Download Resume</a>
            <a href="#contact" class="px-6 py-3 border border-gray-300 rounded-md text-sm font-medium">Contact Me</a>
        </div>
        <div class="flex justify-center gap-4 text-sm text-gray-500">
            <a href="https://github.com/Alok-CS-2022" target="_blank" class="hover:text-gray-900">GitHub</a>
            <span>·</span>
            <a href="#" target="_blank" class="hover:text-gray-900">LinkedIn</a>
            <span>·</span>
            <a href="mailto:you@example.com" class="hover:text-gray-900">Email</a>
        </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold mb-8">Projects</h2>

        @if($featuredProject)
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">
                <div class="md:flex">
                    @if($featuredProject->thumbnail_path)
                        <img src="{{ asset("storage/" . $featuredProject->thumbnail_path) }}" class="md:w-1/2 h-64 md:h-auto object-cover">
                    @endif
                    <div class="p-8 md:w-1/2">
                        <span class="text-xs font-semibold text-yellow-700 bg-yellow-100 px-2 py-1 rounded-full">Featured</span>
                        <h3 class="text-2xl font-bold mt-3 mb-2">{{ $featuredProject->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $featuredProject->description }}</p>
                        @if($featuredProject->tech_stack)
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach($featuredProject->tech_stack as $tech)
                                    <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex gap-3">
                            @if($featuredProject->live_url)
                                <a href="{{ $featuredProject->live_url }}" target="_blank" class="px-4 py-2 bg-gray-900 text-white rounded-md text-sm">View Live</a>
                            @endif
                            @if($featuredProject->github_url)
                                <a href="{{ $featuredProject->github_url }}" target="_blank" class="px-4 py-2 border border-gray-300 rounded-md text-sm">View Code</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    @if($project->thumbnail_path)
                        <img src="{{ asset("storage/" . $project->thumbnail_path) }}" class="h-40 w-full object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="font-semibold mb-2">{{ $project->title }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($project->description, 100) }}</p>
                        @if($project->tech_stack)
                            <div class="flex flex-wrap gap-1 mb-4">
                                @foreach($project->tech_stack as $tech)
                                    <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex gap-3 text-sm">
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="text-gray-900 font-medium">View Live</a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="text-gray-600">View Code</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                @if(!$featuredProject)
                    <p class="text-gray-500 col-span-full text-center">No projects yet.</p>
                @endif
            @endforelse
        </div>
    </section>

    <!-- About -->
    <section id="about" class="bg-white py-16">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-2xl font-bold mb-6">About Me</h2>
            <p class="text-gray-600 mb-6">
                I'm a developer who enjoys building practical, well-structured web applications.
                I work primarily with Laravel and PHP on the backend, paired with modern frontend tools.
            </p>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">Laravel</span>
                <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">PHP</span>
                <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">MySQL</span>
                <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">Tailwind CSS</span>
                <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">JavaScript</span>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="max-w-3xl mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold mb-6">Contact</h2>
        <form method="POST" action="#" class="space-y-4 mb-6">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Name" class="w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" class="w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <textarea name="message" rows="4" placeholder="Message" class="w-full rounded-md border-gray-300 shadow-sm"></textarea>
            </div>
            <button type="submit" class="px-6 py-3 bg-gray-900 text-white rounded-md text-sm font-medium">Send Message</button>
        </form>
        <div class="flex gap-4 text-sm text-gray-500">
            <a href="mailto:you@example.com" class="hover:text-gray-900">Email</a>
            <span>·</span>
            <a href="https://github.com/Alok-CS-2022" target="_blank" class="hover:text-gray-900">GitHub</a>
            <span>·</span>
            <a href="#" target="_blank" class="hover:text-gray-900">LinkedIn</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t py-8 text-center text-sm text-gray-500">
        <p>&copy; {{ date("Y") }} Alok Kharel. Built with Laravel.</p>
    </footer>

</body>
</html>
