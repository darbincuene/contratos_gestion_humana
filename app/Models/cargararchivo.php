<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargararchivo extends Model
{
    //

    use HasFactory;
    protected $table='cargar_archivos';

    protected $fillable=['usuario_id','archivo_id','fecha_subida'];

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id');
    }

    public function archivo(){
        return $this->belongsTo(archivo::class,'archivo_id');
    }
}
