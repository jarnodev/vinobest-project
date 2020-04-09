<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourDate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'seats', 'price'
    ];

    public function seatsTaken()
    {
        return $this->hasMany(UserAppointment::class, 'tour_date_id', 'id');
    }
}
