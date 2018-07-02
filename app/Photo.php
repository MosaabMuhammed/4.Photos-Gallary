<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }
}
