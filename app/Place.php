<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Place extends Model
{

    protected $fillable = [
        'title', 'address', 'longitude', 'latitude', 'content', 'picture', 'type', 'owner_id'
    ];

}
