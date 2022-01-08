<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class wallet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'wallet';

    protected $fillable = [
        'credit',
        'client_id',
        'balance_request_id'
    ];
}
