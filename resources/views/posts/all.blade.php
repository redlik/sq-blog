<div class="flex justify-between items-center h-16 hover:bg-gray-100 p-4 rounded border-b border-gray-200">
    <div>
        <div>{{ $post->title }}</div>
        <div class="text-sm text-gray-500">Created by: {{ $post->author->name }}</div>

    </div>
    <div class="text-sm text-gray-500">
        Posted on: {{ $post->publication_date }}
    </div>
</div>
