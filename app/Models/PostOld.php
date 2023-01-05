<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post{

    public $title;
    public $date;
    public $excerpt;
    public $body;
    public $slug;

    function __construct($title, $date, $body, $excerpt, $link) {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->slug = $link;
    }

    public static function find($slug) {
        // if (file_exists($path = resource_path("posts/$slug.html"))) {
        //     return cache()->remember("posts.{$slug}", now()->addSeconds(5), function() use($path) {
        //         return file_get_contents($path);
        //     });
        // }
        // throw new ModelNotFoundException();
        $posts = Post::all();
        return collect($posts)->firstWhere('slug', $slug);
    }
    public static function findOrFail($slug) {
       
        $post = Post::find($slug);

        if (!$post) {
            return throw new ModelNotFoundException();
        }

        return $post;

    }

    public static function all() {

        $posts = File::files(resource_path("posts"));
        return cache()->remember('posts.all', now()->addSeconds(10), function() use($posts) {
            return collect($posts)->map(function($file) {
                return YamlFrontMatter::parseFile($file);
            })->map(function ($document) {
                return new Post($document->title, $document->date, $document->body(), $document->excerpt, $document->link);
            })->sortByDesc('date');
        });
        
    }
}