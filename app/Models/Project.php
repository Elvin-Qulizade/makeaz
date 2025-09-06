<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];
    public $id;
    public $title;
    public $slug;
    public $description;
    public $order;
    public $created_at;
    public $updated_at;
}

