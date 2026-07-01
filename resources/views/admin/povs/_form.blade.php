@csrf
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" name="title" value="{{ old('title', $pov->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Content</label>
    <textarea name="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content', $pov->content ?? '') }}</textarea>
    @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $pov->sort_order ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('sort_order')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
</div>

<div class="flex justify-end">
    <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Save</button>
</div>
