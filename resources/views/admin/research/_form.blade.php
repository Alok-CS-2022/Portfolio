@csrf
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" name="title" value="{{ old('title', $research->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $research->description ?? '') }}</textarea>
    @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Link (optional)</label>
    <input type="url" name="link" value="{{ old('link', $research->link ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="https://...">
    @error('link')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Thumbnail (optional)</label>
    <input type="file" name="thumbnail" class="mt-1 block w-full">
    @if(isset($research) && $research->thumbnail_path)
        <img src="{{ asset('storage/' . $research->thumbnail_path) }}" class="h-16 w-16 object-cover rounded mt-2">
    @endif
    @error('thumbnail')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $research->sort_order ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('sort_order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="flex justify-end">
    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Save</button>
</div>
