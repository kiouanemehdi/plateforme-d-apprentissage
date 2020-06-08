<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'ID_post';
    protected $fillable = ['ID_prof','ID_class','objet','detail','type','date' ];
}
