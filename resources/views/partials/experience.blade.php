@if($experiences->count())
<section id="experience" class="max-w-5xl mx-auto px-6 py-10">
    <p class="text-xs tracking-widest uppercase mb-2" style="font-family: monospace; color: #666;">WORK HISTORY</p>
    <h2 class="mb-6" style="font-family: Georgia, serif; font-size: 2.5rem; font-weight: 900;">Experience</h2>
    <div class="border border-gray-800">
        @foreach($experiences as $exp)
            <div class="flex flex-col md:flex-row md:items-start gap-4 px-6 py-4 border-b border-gray-300 last:border-b-0">
                <div class="shrink-0 w-32 text-xs text-gray-500 pt-1" style="font-family: monospace;">
                    {{ $exp->start_date->format('M Y') }} -
                    {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <div class="w-1.5 h-1.5 rounded-full" style="background: #8db800;"></div>
                        <span class="font-bold text-sm">{{ $exp->role }}</span>
                        <span class="text-sm text-gray-600">@ {{ $exp->company }}</span>
                        @if($exp->location)
                            <span class="text-xs text-gray-400" style="font-family: monospace;">{{ $exp->location }}</span>
                        @endif
                    </div>
                    @if($exp->description)
                        <p class="text-sm text-gray-600 mt-1">{{ $exp->description }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
