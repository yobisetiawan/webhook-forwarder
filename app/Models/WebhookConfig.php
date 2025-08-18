<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookConfig extends Model
{

    protected $fillable = [
        'from_domain_url',
        'to_domain_url',
    ];
}
