@if($research->count())
<section id="research" class="max-w-5xl mx-auto px-6 py-10">
    <p class="text-xs tracking-widest uppercase mb-2" style="font-family: monospace; color: #666;">SELECTED PUBLICATIONS</p>
    <h2 class="mb-2" style="font-family: Georgia, serif; font-size: 2.5rem; font-weight: 900;">Research</h2>
    <p class="text-sm text-gray-500 mb-6">A few selected works, ordered by sort order. Click thumbnails to open links.</p>
    <div class="border border-gray-800">
        @foreach($research as $index => $item)
            <div class="flex gap-4 px-6 py-4 border-b border-gray-300 last:border-b-0 items-start">
                <div class="shrink-0 w-8 text-xs text-gray-400 pt-1" style="font-family: monospace;">
                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </div>
                @if($item->thumbnail_path)
                    <div class="shrink-0">
                        @if($item->link)
                            <a href="{{ $item->link }}" target="_blank">
                                <img src="{{ asset('storage/' . $item->thumbnail_path) }}" class="w-24 h-16 object-cover border border-gray-300 hover:opacity-80 transition">
                            </a>
                        @else
                            <img src="{{ asset('storage/' . $item->thumbnail_path) }}" class="w-24 h-16 object-cover border border-gray-300">
                        @endif
                    </div>
                @endif
                <div class="flex-1">
                    <h3 class="font-bold text-sm mb-1">
                        @if($item->link)
                            <a href="{{ $item->link }}" target="_blank" class="hover:underline">{{ $item->title }}</a>
                        @else
                            {{ $item->title }}
                        @endif
                    </h3>
                    @if($item->description)
                        <p class="text-xs text-gray-600">{{ $item->description }}</p>
                    @endif
                    @if($item->link)
                        <a href="{{ $item->link }}" target="_blank" class="inline-block mt-2 text-xs px-2 py-0.5 border" style="font-family: monospace; color: #5a7a00; border-color: #5a7a00;">Visit &rarr;</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif
