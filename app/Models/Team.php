<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $id;
    public $name;
    public $position;
    public $bio;
    public $email;
    public $linkedin;
    public $created_at;
    public $updated_at;
}

