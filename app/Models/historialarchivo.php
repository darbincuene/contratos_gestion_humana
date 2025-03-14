<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historialarchivo extends Model
{
    //
    use HasFactory;

    protected $fillable = ['fecha_movimiento','accion','archivo_id','usuario_id'];

    public function archivo(){
        return $this->belongsTo(archivo::class,'archivo_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class,'usuario_id');
    }


}
