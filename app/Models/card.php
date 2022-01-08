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
        'card_status_id',
        'category_id',
        'client_id',
        'pdf_path'
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

    public function toArray(): array{
        return [
            'serial' => $this->serial,
            'code' => $this->code,
            'category_id' => $this->category_id,
            'pdf_path' =>  env("APP_URL")."cards/".$this->pdf_path,
            'category_name' => $this->category->name,
            'category_value' => $this->category->value
        ];
    }
}
