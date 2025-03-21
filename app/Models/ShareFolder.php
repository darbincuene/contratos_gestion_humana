<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ShareFolder extends Model
{
    //
    use HasFactory;
    protected $table='shared_folders';
    protected $fillable = ['carpeta_id','token','expires_at'];

    public function carpeta(){
        return $this->belongsTo(carpeta::class);
    }

    public function isExpired(): bool
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }
}
