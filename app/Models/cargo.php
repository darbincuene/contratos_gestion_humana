<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use  HasFactory;
    protected $fillable=['nombre'];

    public  function carpetas(){
        return $this->hasMany(carpeta::class,'cargo_id');

    }
}
