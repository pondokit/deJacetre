<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class About extends Model
{
	protected $table = 'about';
    protected $fillable = ['about'];

    public function getAboutHtmlAttribute()
    {
    	return Markdown::convertToHtml(e($this->about));
    }
}