<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class backpackCard extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CrudTrait;

    protected $table = 'cards';

    protected $fillable = [
        'serial',
        'code',
        'card_status_id',
        'category_id',
        'client_id',
        'pdf_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function client(){
        return $this->belongsTo(client::class);
    }
    
    public function getDownloadableLink() {
        return '<a href="'.url($this->pdf_path).'" target="_blank">View</a>';
    }
}
