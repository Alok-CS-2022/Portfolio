<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Site Settings</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" value="{{ old('name', $settings['name'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Title / Role</label>
                        <input type="text" name="title" value="{{ old('title', $settings['title'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('bio', $settings['bio'] ?? '') }}</textarea>
                        @error('bio')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="https://linkedin.com/in/...">
                        @error('linkedin_url')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url" name="github_url" value="{{ old('github_url', $settings['github_url'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="https://github.com/...">
                        @error('github_url')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Photo</label>
                        <input type="file" name="photo" class="mt-1 block w-full">
                        @if(!empty($settings['photo_path']))
                            <img src="{{ asset('storage/' . $settings['photo_path']) }}" class="h-24 w-24 object-cover rounded mt-2 border">
                        @endif
                        @error('photo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">CV (PDF)</label>
                        <input type="file" name="cv" accept=".pdf" class="mt-1 block w-full">
                        @if(!empty($settings['cv_path']))
                            <a href="{{ asset('storage/' . $settings['cv_path']) }}" target="_blank" class="text-blue-600 text-sm mt-1 inline-block">View current CV</a>
                        @endif
                        @error('cv')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
