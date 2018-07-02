<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }
}
