<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    
    protected $fillable = ['ID_etd','ID_class','date_inscription'];
}
