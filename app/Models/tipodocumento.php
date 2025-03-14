<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipodocumento extends Model
{
    use HasFactory;

    protected $table='tipo_documentos';

    protected $fillable=['nombre'];


    public function archivos(){
        return $this->hasMany(archivo::class,'tipo_documento_id');
    }
}
