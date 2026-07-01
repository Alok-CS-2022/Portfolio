@if($povs->count() > 0)
<section id="pov" class="max-w-5xl mx-auto px-6 py-16">
    <div class="flex items-center justify-between mb-10">
        <div>
            <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Thoughts & Notes</p>
            <h2 class="font-serif text-4xl md:text-5xl font-black">My POV</h2>
        </div>
        <a href="{{ route('povs.index') }}" class="font-mono text-xs uppercase tracking-widest border-b border-black hover:border-[#8db800] hover:text-[#5a7a00]">
            View All &rarr;
        </a>
    </div>
    <div class="space-y-6">
        @foreach($povs->take(3) as $index => $pov)
        <a href="{{ route('povs.show', $pov) }}" class="border border-black p-6 relative block hover:bg-white/40 transition-colors">
            <div class="flex items-start gap-4">
                <span class="font-mono text-xs text-[#5a7a00] mt-1">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <span class="w-2 h-2 rounded-full bg-[#8db800] mt-2 flex-shrink-0"></span>
                <div>
                    <h3 class="font-serif text-xl font-bold mb-2">{{ $pov->title }}</h3>
                    <p class="text-sm leading-relaxed">{{ Str::limit($pov->content, 200) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif
