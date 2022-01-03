<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}