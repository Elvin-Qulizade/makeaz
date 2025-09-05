<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $id;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $order;
    public $created_at;
    public $updated_at;
}

