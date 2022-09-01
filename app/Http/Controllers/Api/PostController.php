<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $queryString = $request->query();

        $query = Post::select("title", "content", "id", "created_at", "user_id");

        if (key_exists("user_id", $queryString)) {
            $query->where("user_id", $queryString["user_id"]);
        }

        if (key_exists("order_by", $queryString)) {
            if (key_exists("order_direction", $queryString)) {
                $query->orderBy($queryString["order_by"], $queryString["order_direction"]);
            } else {
                $query->orderBy($queryString["order_by"]);
            }
        } else {
            $query->orderBy("created_at", "desc");
        }

        $posts = $query->paginate(5);

        $posts->load("user:name,id");

        $posts->map(function ($post) {
            $post->content = substr($post->content, 0, 100) . "...";

            // unset($post->cover_img);
            // unset($post->category_id);
            // unset($post->slug);

            return $post;
        });

        return response()->json($posts);
    }
}
