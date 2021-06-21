<div class="flex justify-between items-center h-16 hover:bg-gray-100 p-4 rounded border-b border-gray-200">
    <div>
        <div class="hover:underline hover:text-gray-600">
            <a href="{{ route('post.show', ['id' => $post->id]) }}">
            {{ $post->title }}
            </a>
        </div>
        <div class="text-sm text-gray-500">Created by: {{ $post->author->name }}</div>

    </div>
    <div class="text-sm text-gray-500">
        Posted on: {{ date('d-m-Y', strtotime($post->publication_date)) }}
    </div>
</div>
