<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
    use HasFactory;

    protected $table = 'carpeta';
    
    protected $fillable = [
        'nombre',
        'carpeta_id',
        'created_at',
        'updated_at',
    ];

    public function carpetas_hijos()
    {
        return $this->hasMany(Carpeta::class);
    }

    public function archivos(){
        return $this->hasMany(Archivo::class);
    }
}
