<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'position',
        'bio',
        'image',
        'email'
    ];
    public $id;
    public $name;
    public $position;
    public $bio;
    public $email;
    public $created_at;
    public $updated_at;
}

