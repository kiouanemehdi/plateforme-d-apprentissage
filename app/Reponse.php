<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $primaryKey = 'ID_reponse';
    protected $fillable = ['ID_post','ID_etd','contenu','date' ];

}
