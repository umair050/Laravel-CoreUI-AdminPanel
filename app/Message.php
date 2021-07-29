<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'message',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
