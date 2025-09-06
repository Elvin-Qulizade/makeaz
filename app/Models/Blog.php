<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author',
        'published_at',
    ];
    public $id;
    public $title;
    public $slug;
    public $content;
    public $image;
    public $author;
    public $published_at;
    public $created_at;
    public $updated_at;
}
