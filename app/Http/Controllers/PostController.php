<?php

/**
 * GET -> 200
 * POST -> 201
 * PUT/PATCH -> 202
 * DELETE -> 203
 */
namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Post::all(),
            'code' => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response([
            'data' => $post,
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
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
