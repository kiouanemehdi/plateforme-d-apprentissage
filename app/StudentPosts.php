<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPosts extends Model
{
    protected $primaryKey = 'ID_post';
    protected $fillable = ['ID_etd','ID_class','type','topic','objet','detail','visibility','date' ];
}
