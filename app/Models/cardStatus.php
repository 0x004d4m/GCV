<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardStatus extends Model
{
    use HasFactory;

    protected $table = 'card_status';

    protected $fillable = [
        'status'
    ];
}
