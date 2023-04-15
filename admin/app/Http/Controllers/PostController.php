<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(PostsRequest $request)
    {
        $post =  Posts::create($request);

        return response()->json([
            "status" => true,
            "message" => "Post Created",
            "data" => $post
        ], 200);
    }
    public function index(Request $request)
    {
        $post = Posts::all();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $post
        ], 200);
    }
    public function get(Request $request, $id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json([
                "status" => false,
                "message" => "Post not found",
                "data" => []
            ], 404);
        }
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $post
        ], 200);
    }
    public function update(PostsRequest $request, $id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->update($request);
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $post
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Post not found",
                "data" => null
            ], 404);
        }
    }
    public function delete(PostsRequest $request, $id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->delete($request);
            return response()->json([
                "status" => true,
                "message" => "Post is deleted ",
                "data" => null
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Post not found",
                "data" => null
            ], 404);
        }
    }
}
