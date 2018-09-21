<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $fillable = 
    [
    	'facebook', 'instagram', 'github', 'twitter', 'youtube'
    ];
}
