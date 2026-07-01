<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Research</h2>
            <a href="{{ route('admin.research.create') }}" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Add New Research</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white shadow sm:rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Thumbnail</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Link</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sort Order</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($researchItems as $item)
                            <tr>
                                <td class="px-4 py-3">
                                    @if($item->thumbnail_path)
                                        <img src="{{ asset('storage/' . $item->thumbnail_path) }}" class="h-12 w-12 object-cover rounded">
                                    @else
                                        <span class="text-gray-400 text-sm">No image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $item->title }}</td>
                                <td class="px-4 py-3">
                                    @if($item->link)
                                        <a href="{{ $item->link }}" target="_blank" class="text-blue-600 text-sm">Visit</a>
                                    @else
                                        <span class="text-gray-400 text-sm">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $item->sort_order }}</td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.research.edit', $item) }}" class="text-blue-600 text-sm">Edit</a>
                                    <form action="{{ route('admin.research.destroy', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 text-sm" onclick="return confirm(`Delete this research item?`)">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">No research items yet. Add your first one!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
