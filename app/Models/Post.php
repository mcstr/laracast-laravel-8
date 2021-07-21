<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;
    
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public static function all()

    {
        $posts = collect(File::files(resource_path("posts")));

        $test = $posts->map(fn($file) => YamlFrontMatter::parseFile($file));
        
        return $test->map(fn($file) => new Post(
                            $file->title,
                            $file->excerpt,
                            $file->date,
                            $file->body(),
                            $file->slug
                        ))->sortByDesc('date');



        // return cache()->rememberForever('posts.all', function() {
        //     return collect(File::files(resource_path("posts")))
        //             ->map(fn($file) => YamlFrontMatter::parseFile($file))
        //             ->map(fn($document) => new Post(
        //                 $document->title,
        //                 $document->excerpt,
        //                 $document->date,
        //                 $document->slug, 
        //                 $document->body(),
        //                 ddd($document)
        //             ))->sortByDesc('date');
        // });

    }

    public static function find($slug)

    {
        return static::all()->firstWhere('slug', $slug);
    }
}