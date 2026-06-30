<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" rows="4"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Thumbnail Image</label>
    <input type="file" name="thumbnail" class="mt-1 block w-full">
    @if(isset($project) && $project->thumbnail_path)
        <img src="{{ asset('storage/' . $project->thumbnail_path) }}" class="mt-2 h-24 rounded">
    @endif
    @error('thumbnail') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Tech Stack (comma-separated)</label>
    <input type="text" name="tech_stack"
        value="{{ old('tech_stack', isset($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}"
        placeholder="Laravel, Tailwind, MySQL"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('tech_stack') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Live URL</label>
    <input type="text" name="live_url" value="{{ old('live_url', $project->live_url ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('live_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">GitHub URL</label>
    <input type="text" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('github_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4 flex items-center">
    <input type="checkbox" name="is_featured" value="1"
        {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
        class="rounded border-gray-300">
    <label class="ml-2 text-sm text-gray-700">Featured Project</label>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order ?? 0) }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error('sort_order') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

