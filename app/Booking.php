<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'guest_name', 'guest_email', 'date', 'place_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
