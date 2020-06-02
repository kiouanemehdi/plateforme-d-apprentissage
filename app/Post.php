<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'ID_post';
    protected $fillable = ['ID_prof','objet','detail','type','date' ];
}
