<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'guest_name', 'content', 'rating', 'place_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    //
}
