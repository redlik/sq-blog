<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 md:px-0">
                <h4 class="text-gray-600 mb-8">Listed below are all posts created by you so far</h4>
            </div>
            @if ($posts->isNotEmpty())
            <div class="my-6 px-6 md:px-0">
                <a href="{{route('post.create')}}" class="text-indigo-700 underline hover:text-indigo-400">+ Create
                    new post</a>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @each('posts.list', $posts, 'post', 'posts.empty')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
