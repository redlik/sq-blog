<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller implements ShouldQueue
{
    public function initialise()
    {
        $admin = User::where('name', 'admin')->first();
        if ($admin === null) {
            $data = [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123!'),
            ];
            User::create($data);
        }

        $this->getPosts();

        return back();
    }

    public function getPosts()
    {
        $admin = User::where('name', 'admin')->first();
        try {
            $posts = json_decode(Http::get('https://sq1-api-test.herokuapp.com/posts'), true);
            if ($posts === null)
                {
                    throw new Exception("The feed is not accessible at the moment");
                }
            foreach ($posts['data'] as $post) {
                $data = [
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'publication_date' => $post['publication_date'],
                    'user_id' => $admin->id,
                ];
                Post::create($data);
            }
            return back()->with('success', 'External feed initialised successfully');
        }
        catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
