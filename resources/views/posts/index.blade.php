<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to SQ Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if(Session::has('success'))
                        <div class="px-8 py-6 text-green-700">{{ Session::get('success') }}</div>
                    @endif
                    @if($errors->any())
                            <div class="px-8 py-6 text-red-800">{{ $errors->first() }}</div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        {{ $posts->links() }}
                    </div>
                    @each('posts.all', $posts, 'post', 'posts.empty')
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
