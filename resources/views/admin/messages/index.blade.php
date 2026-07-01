<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact Messages</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto">
        @if($messages->isEmpty())
            <p class="text-gray-500">No messages yet.</p>
        @else
            <div class="space-y-4">
                @foreach($messages as $msg)
                <div class="bg-white border rounded-md p-5 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $msg->name }}</p>
                            <a href="mailto:{{ $msg->email }}" class="text-sm text-blue-600">{{ $msg->email }}</a>
                        </div>
                        <span class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $msg->message }}</p>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-admin-layout>
