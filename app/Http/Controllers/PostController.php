<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->orderBy('publication_date', 'DESC')->paginate(25);

        return view('posts.index', compact('posts'));
    }

    public function postsByUser()
    {
        $posts = Post::where('user_id', Auth::id())->sortByPublished();

        return view('dashboard', compact('posts'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
        ]);

        $post = new Post();

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->publication_date = now();
        $post->user_id = Auth::id();

        $post->save();

        return redirect('/dashboard');

    }
}
