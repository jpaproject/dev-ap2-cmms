<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAssetForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'form_id',
    ];

    public $timestamps = true;

    public function asset()
    {
        return $this->belongsTo(asset::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
