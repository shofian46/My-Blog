<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $posts)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "posts" => $posts
        ]);
    }

    public function fetchLike(Request $request)
    {
        $posts = Post::find($request->posts);

        return response()->json(['posts' => $posts]);
    }

    public function handleLike(Request $request)
    {
        $posts = Post::find($request->posts);
        $posts->increment('like');
        $posts->save();

        return response()->json(['message' => 'Liked']);
    }

    public function fetchDislike(Request $request)
    {
        $posts = Post::find($request->posts);

        return response()->json(['posts' => $posts]);
    }

    public function handleDislike(Request $request)
    {
        $posts = Post::find($request->posts);
        $posts->increment('dislike');
        $posts->save();

        return response()->json(['message' => 'Disliked']);
    }
}
