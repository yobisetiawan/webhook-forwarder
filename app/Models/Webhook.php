<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{

    protected $fillable = [
        'path',
        'body',
        'header',
        'logs',
        'host',
        'full_url',
    ];

    protected $casts = [
        'body' => 'array',
        'header' => 'array',
        'logs' => 'array',
    ];
}
