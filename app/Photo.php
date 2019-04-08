<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $uploads = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo)
    {

        return $this->uploads . $photo;
    }
}
