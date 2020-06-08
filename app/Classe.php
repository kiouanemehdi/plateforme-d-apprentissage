<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //
    protected $primaryKey = 'ID_class';
    protected $fillable = ['ID_univ','ID_prof','ID_sem','code','date_creation' ];
}
