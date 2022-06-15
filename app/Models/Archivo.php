<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivo';
    
    protected $fillable = [
        'nombre',
        'url',
        'extension',
        'carpeta_id',
        'created_at',
        'updated_at',
    ];

}
