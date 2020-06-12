<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $primaryKey = 'ID_reponse';
    protected $fillable = ['ID_prof','ID_post','ID_post_etd','ID_etd','contenu','date' ];

}
