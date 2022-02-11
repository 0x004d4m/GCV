<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class balanceRequest extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'balance_request';

    protected $fillable = [
        'image',
        'amount',
        'balance_status_id',
        'client_id'
    ];

    protected $attributes = [
        'image'=>'/uploads/addedByAdmin.jpg'
    ];

    public function balance_status(){
        return $this->belongsTo(balanceStatus::class,'balance_status_id','id');
    }

    public function client(){
        return $this->belongsTo(client::class,'client_id','id');
    }
}
