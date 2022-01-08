<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'value'
    ];

    protected $hidden = [
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client(){
        return $this->belongsTo(client::class);
    }
}
