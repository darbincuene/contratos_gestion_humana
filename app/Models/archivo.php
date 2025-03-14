<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
    //
    use HasFactory;

    protected $fillable=['nombre_archivo','tipo_archivo','ruta_archivo','subcarpeta_id','tipo_documento_id'];
 
    
    public function subcarpeta(){
        return $this->belongsTo(subcarpeta::class,'subcarpeta_id');
    }

    public function tipo_documento(){
        return $this->belongsTo(tipodocumento::class,'tipo_documento_id');
    }

    public function cargararchivos(){
        return $this->hasMany(cargararchivo::class,'archivo_id');
    }

    public function historialarchivos(){
        return $this->hasMany(historialarchivo::class,'archivo_id');
    }
}
