<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{

    public function create(Request $r)
    {
        $new_post = [
            'title' => 'meu primeiro post',
            'content' => 'conteudo basico',
            'author' => 'Matheus',
        ];

        $post = new Post($new_post);
        $post->save();

        return 'Post criado com sucesso';
    }

    public function read(Request $r)
    {
        $post = new Post();
        $post = $post->find(1);
        return $post;
    }

    public function all(Request $r)
    {
        $posts = Post::all();
        return $posts;
    }

    public function update(Request $r)
    {
        $post = Post::where('id', '>', 1)->update([
            'author' => 'Matheus',
            'title' => 'meu primeiro post',
        ]);
        $post->save();
        return $post;
    }

    public function delete(Request $r)
    {
        $post = Post::where('id', '>', '0')->delete();
        return $post;
    }
}
