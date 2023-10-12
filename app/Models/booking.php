<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\hotel;
use App\Models\ruangan;


class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'visitor_id',
        'hotel_id',
        'room_id',
        'visitor_name',
        'visitor_nohp',
        'total_visitor',
        'checkin',
        'checkout',
        'status',
        'price',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitor()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(ruangan::class);
    }
}
