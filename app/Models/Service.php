<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $id;
    public $title;
    public $slug;
    public $description;
    public $order;
    public $created_at;
    public $updated_at;
}

