<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $fillable = ['file'];

    public function photos()
    {

        return $this->belongsTo('App\Photo');
    }
}
