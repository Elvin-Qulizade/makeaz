<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'logo',
        'website',
    ];
    public $id;
    public $name;
    public $logo;
    public $website;
    public $created_at;
    public $updated_at;
}

