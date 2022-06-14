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
        'created_at',
        'updated_at',
    ];

    public function carpeta_padre()
    {
        return $this->belongsTo(Carpeta::class);
    }

    public function carpetas_hijos()
    {
        return $this->hasMany(Carpeta::class);
    }
}
