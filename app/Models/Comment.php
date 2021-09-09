<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // note again that the convention tell us to name the method
    // the same way that we name the model, so laravel can do its
    // magic and reference the post_id column. In case we don't
    // follow conventions we need to specify the column we want as
    // reference
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
