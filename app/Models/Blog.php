<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
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
