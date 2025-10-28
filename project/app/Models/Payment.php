<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'amount',
        'comment',
        'status'
    ];

    public $timestamps = false;
}
