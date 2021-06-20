<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('post.store') }}">
                    @csrf

                        <!-- Post title -->
                        <div>
                            <x-label for="title" :value="__('Post title')" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old
                            ('title')"
                                     required autofocus />
                        </div>

                        <!-- Post description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-textarea id="description" class="block mt-1 w-full" rows="6" name="description"
                                     :value="old
                            ('description')" required />
                        </div>

                        <div class="flex items-center justify-start mt-4">

                            <x-button class="bg-green-700 font-bold">
                                {{ __('Publish') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
