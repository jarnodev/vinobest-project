<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'tour_date_id', 'allergies', 'payment_done'
    ];

    /**
     * Has one relation to a tourdate
     */
    public function tourDate()
    {
        return $this->hasOne(TourDate::class, 'id', 'tour_date_id');
    }

    /**
     * Has one relation to a user
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
