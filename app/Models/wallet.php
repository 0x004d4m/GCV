<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class wallet extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'wallet';

    protected $fillable = [
        'credit',
        'client_id',
        'balance_request_id'
    ];
}
