<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'order',
    ];
    public $id;
    public $title;
    public $slug;
    public $description;
    public $order;
    public $created_at;
    public $updated_at;
    public function modules()
    {
        return $this->morphMany(Module::class, 'moduleable');
    }
}
