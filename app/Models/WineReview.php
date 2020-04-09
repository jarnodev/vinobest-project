<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WineReview extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'wine_id', 'rating', 'message'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function wine()
    {
        return $this->hasOne(Wine::class, 'id', 'wine_id');
    }
}
