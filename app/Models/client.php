<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class client extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'client';

    protected $fillable = [
        'phone',
        'email',
        'username',
        'password',
        'name',
        'currentCredit'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
