<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcarpeta extends Model
{
    //
    use HasFactory;
    protected $table='subcarpetas';
    protected $fillable = ['id','nombre','carpeta_id'];

    public function carpeta(){
        return $this->belongsTo(carpeta::class,'carpeta_id');
    }
    public function archivos(){
        return $this->hasMany(archivo::class,'subcarpeta_id');
    }
}
