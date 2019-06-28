<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Post extends Model
{
    protected $connection = "mongodb";
    protected $table = "posts";
    protected $fillable = [
        'title',"content","created_at","updated_at"
    ];
}