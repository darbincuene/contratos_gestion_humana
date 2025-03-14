<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carpeta extends Model
{
    use HasFactory;

    protected $fillable=['nombre','cargo_id'];

    public function cargo(){
        return $this->belongsTo(cargo::class,'cargo_id');
    }

    public function subcarpeta(){
        return $this->hasOne(subcarpeta::class,'carpeta_id');
    }
}
