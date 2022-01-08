<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balanceStatus extends Model
{
    use HasFactory;
    
    protected $table = 'balance_status';

    protected $fillable = [
        'status'
    ];
}
