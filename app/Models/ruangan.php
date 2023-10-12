<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }

    public function booking()
    {
        return $this->hasMany(booking::class);
    }


}
