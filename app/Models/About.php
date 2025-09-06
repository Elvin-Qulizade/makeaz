<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content'
    ];
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
}
