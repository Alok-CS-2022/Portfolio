<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Company</label>
    <input type="text" name="company" value="{{ old("company", $experience->company ?? "") }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error("company") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Role</label>
    <input type="text" name="role" value="{{ old("role", $experience->role ?? "") }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error("role") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Location (optional)</label>
    <input type="text" name="location" value="{{ old("location", $experience->location ?? "") }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error("location") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4 grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="start_date"
            value="{{ old("start_date", isset($experience->start_date) ? $experience->start_date->format("Y-m-d") : "") }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error("start_date") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">End Date (leave blank if current)</label>
        <input type="date" name="end_date"
            value="{{ old("end_date", isset($experience->end_date) ? $experience->end_date->format("Y-m-d") : "") }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error("end_date") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Description (optional)</label>
    <textarea name="description" rows="4"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old("description", $experience->description ?? "") }}</textarea>
    @error("description") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old("sort_order", $experience->sort_order ?? 0) }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    @error("sort_order") <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

