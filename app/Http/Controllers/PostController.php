<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $TimeInitial = microtime(true);
        $posts = Post::all();
        $TimeEnding = microtime(true);
        $content = [
            'memoryUsage' => memory_get_usage(),
            'executionTime' => $this->timeExecution($TimeInitial, $TimeEnding),
            'postsCount' => count($posts),
            'posts' => $this->controllReturn($posts),
        ];
        return $content;
    }

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
        $content = [
            'posts' => $post,
            'executionTime' => $this->timeExecution($TimeInitial, $TimeEnding),
            'memoryUsage' => memory_get_usage(),
        ];
        return $content;
    }

    public function createMass(Request $r)
    {
        $TimeInitial = microtime(true);
        $new_posts = $this->createMassPost(); 
        Post::insert($new_posts); 
        $TimeEnding = microtime(true);
        $content = [
            'total_posts_inserted' => count($new_posts),
            'executionTime' => $this->timeExecution($TimeInitial, $TimeEnding),
            'memoryUsage' => memory_get_usage(),
        ];
        return response()->json($content);
    }

    protected function createMassPost()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();
        return array_map(function ($post) {
            return [
                'userId'  => $post['userId'],
                'title'   => $post['title'],
                'content' => $post['body'],
                'author'  => 'Matheus',
            ];
        }, $posts);
    }

    protected function controllReturn($posts)
    {
        return $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'author' => $post->author,
            ];
        });
    }

    protected function timeExecution($timeInitial, $timeEnding)
    {
        return $timeEnding - $timeInitial;
    }
}
