<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Category;

class BlogController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::with(['author', 'category'])
            // ->where('published_at', '<=', now())
            // ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'content' => $post->content,
                    'featured_image' => $post->featured_image,
                    'published_at' => $post->published_at,
                    'author' => [
                        'id' => $post->author->id,
                        'name' => $post->author->name,
                        'email' => $post->author->email,
                        'avatar' => $post->author->avatar,
                    ],
                    'category' => [
                        'id' => $post->category->id,
                        'name' => $post->category->name,
                        'slug' => $post->category->slug,
                    ],
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }
}
