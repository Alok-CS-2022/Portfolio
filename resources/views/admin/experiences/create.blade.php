<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Experience</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route("admin.experiences.store") }}" method="POST">
                    @csrf
                    @include("admin.experiences._form")

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md">Save Experience</button>
                        <a href="{{ route("admin.experiences.index") }}" class="text-gray-600">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>

