<section class="max-w-5xl mx-auto px-6 py-10">
    <div class="border border-gray-800 p-8" style="background: #fafaf7;">
        <div class="inline-block border border-gray-800 px-2 py-0.5 text-xs mb-4" style="font-family: monospace; color: #5a7a00; border-color: #5a7a00;">
            RESEARCH LOG
        </div>
        <p class="text-xs tracking-widest uppercase mb-3" style="font-family: monospace; color: #666;">
            {{ $settings['title'] ?? 'Full-Stack Developer' }}
        </p>
        <div class="flex flex-col md:flex-row gap-8 items-start">
            <div class="flex-1">
                <h1 class="mb-4" style="font-family: Georgia, serif; font-size: 3.5rem; font-weight: 900; line-height: 1.05;">
                    {{ $settings['name'] ?? 'Alok Kharel' }}
                </h1>
                <div class="text-sm text-gray-700 mb-6 leading-relaxed space-y-2">
                    @foreach(explode("\n", $settings['bio'] ?? '') as $para)
                        @if(trim($para))
                            <p>{{ trim($para) }}</p>
                        @endif
                    @endforeach
                </div>
                <div class="flex flex-wrap gap-2">
                    @if(!empty($settings['email']))
                        <a href="mailto:{{ $settings['email'] }}" class="px-3 py-1 border border-gray-800 text-xs hover:bg-gray-800 hover:text-white transition" style="font-family: monospace;">EMAIL</a>
                    @endif
                    @if(!empty($settings['cv_path']))
                        <a href="{{ asset('storage/' . $settings['cv_path']) }}" target="_blank" class="px-3 py-1 border border-gray-800 text-xs hover:bg-gray-800 hover:text-white transition" style="font-family: monospace;">CV</a>
                    @endif
                    @if(!empty($settings['github_url']))
                        <a href="{{ $settings['github_url'] }}" target="_blank" class="px-3 py-1 border border-gray-800 text-xs hover:bg-gray-800 hover:text-white transition" style="font-family: monospace;">GITHUB</a>
                    @endif
                    @if(!empty($settings['linkedin_url']))
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="px-3 py-1 border border-gray-800 text-xs hover:bg-gray-800 hover:text-white transition" style="font-family: monospace;">LINKEDIN</a>
                    @endif
                </div>
            </div>
            @if(!empty($settings['photo_path']))
                <div class="shrink-0">
                    <div class="border-2 border-gray-800 p-1" style="background: white;">
                        <img src="{{ asset('storage/' . $settings['photo_path']) }}" class="w-40 h-48 object-cover" alt="{{ $settings['name'] ?? '' }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
