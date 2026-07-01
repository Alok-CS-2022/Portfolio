<footer class="border-t border-black mt-16">
    <div class="max-w-5xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="font-mono text-xs uppercase tracking-widest">
            &copy; {{ date('Y') }} {{ $settings['name'] ?? '' }}
        </p>

        <div class="flex gap-6 font-mono text-xs uppercase tracking-widest">
            @if(!empty($settings['email']))
                <a href="mailto:{{ $settings['email'] }}" class="hover:text-[#5a7a00]">Email</a>
            @endif
            @if(!empty($settings['github_url']))
                <a href="{{ $settings['github_url'] }}" target="_blank" class="hover:text-[#5a7a00]">GitHub</a>
            @endif
            @if(!empty($settings['linkedin_url']))
                <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="hover:text-[#5a7a00]">LinkedIn</a>
            @endif
        </div>

        <p class="font-mono text-[10px] uppercase tracking-widest text-[#5a7a00]">
            Built with Laravel
        </p>
    </div>
</footer>
