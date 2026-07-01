@if($povs->count() > 0)
<section id="pov" class="max-w-5xl mx-auto px-6 py-16">
    <p class="font-mono text-xs tracking-widest uppercase text-[#5a7a00] mb-2">// Thoughts & Notes</p>
    <h2 class="font-serif text-4xl md:text-5xl font-black mb-10">My POV</h2>

    <div class="space-y-6">
        @foreach($povs as $index => $pov)
        <div class="border border-black p-6 relative">
            <div class="flex items-start gap-4">
                <span class="font-mono text-xs text-[#5a7a00] mt-1">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <span class="w-2 h-2 rounded-full bg-[#8db800] mt-2 flex-shrink-0"></span>
                <div>
                    <h3 class="font-serif text-xl font-bold mb-2">{{ $pov->title }}</h3>
                    <p class="text-sm leading-relaxed">{{ $pov->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
