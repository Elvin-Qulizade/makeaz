<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'order',
    ];
    public $id;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $image;
    public $stock;
    public $order;
    public $created_at;
    public $updated_at;
}

