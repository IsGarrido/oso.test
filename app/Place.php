<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Place extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'address', 'longitude', 'latitude', 'content', 'picture', 'type', 'owner_id'
    ];

    protected $dates = ['deleted_at'];

}
