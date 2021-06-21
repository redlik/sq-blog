<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title}}
        </h2>
        <div class="text-sm text-gray-600">
            Created by {{ $post->author->name }} on {{ date('d-m-Y', strtotime($post->publication_date)) }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $post->description }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
