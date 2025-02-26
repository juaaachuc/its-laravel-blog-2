<?php

/**
 * GET -> 200
 * POST -> 201
 * PUT/PATCH -> 202
 * DELETE -> 203
 */
namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([
            'data' => Post::paginate($request->get('size', 10)),
            'code' => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Post::create($request->all());

        return response([
            'data' => $request->all(),
            'message' => 'Post created successfully',
            'code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->printTimestampsToLog();
            return response()->json([
                'data' => $post,
                'code' => 200
            ]);
        } catch (ModelNotFoundException $e) {
            return response([
                'data' => [],
                'message' => 'Not Found',
                'code' => 404
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->all());

        return response([
            'data' => $post,
            'message' => 'Post updated successfully',
            'code' => 202
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response([
            'data' => [],
            'message' => 'Post deleted successfully',
            'code' => 203
        ], 203);
    }
}
