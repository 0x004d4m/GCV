<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class card extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'cards';

    protected $fillable = [
        'serial',
        'code',
        'status',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
