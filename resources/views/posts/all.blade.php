<div class="flex justify-between items-center hover:bg-gray-100 px-4 py-6 md:py-4 rounded border-b
border-gray-200">
    <div>
        <div class="hover:underline hover:text-gray-600">
            <a href="{{ route('post.show', ['id' => $post->id]) }}">
            {{ $post->title }}
            </a>
        </div>
        <div class="text-sm text-gray-500">Created by: {{ $post->author->name }}</div>

    </div>
    <div class="text-sm text-gray-500 text-right">
        <span class="invisible md:visible">Posted on: </span>{{ date('d-m-Y', strtotime($post->publication_date)) }}
    </div>
</div>
