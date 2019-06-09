<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;


class Place extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'title', 'address', 'longitude', 'latitude', 'content', 'picture', 'type', 'owner_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
