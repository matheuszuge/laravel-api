<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TimeInitial = microtime(true);
        $posts = Post::all();
        $TimeEnding = microtime(true);
        $ExecutionTime = $TimeEnding - $TimeInitial;
        if ($ExecutionTime < 1) {
        $formatted = number_format($ExecutionTime * 1000, 2);
            $ExecutionTime = "Tempo de execução: {$formatted} ms";
        } else {
            $formatted = number_format($ExecutionTime, 2);
            $ExecutionTime = "Tempo de execução: {$formatted} s";
        }
        $content = [
            'memoryUsage' => memory_get_usage(),
            'executionTime' => $ExecutionTime,
            'posts' => $posts,
        ];
        return $content;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $TimeInitial = microtime(true);
        $new_post = [
            'title' => 'Meu post',
            'content' => 'conteudo basico',
            'author' => 'Matheus',
        ];
        $post = new Post($new_post);
        $post->save();
        $TimeEnding = microtime(true);
        $ExecutionTime = $TimeEnding - $TimeInitial;
        $content = [
            'posts' => $post,
            'executionTime' => $ExecutionTime,
            'memoryUsage' => memory_get_usage(),
        ];
        return $content;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = new Post();
        $post = $post->find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = Post::find($id)->update([
        'author' => 'Matheus',
            'title' => 'alterado',
        ]);
        return $posts;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id)->delete();
        return $post;
    }
}
