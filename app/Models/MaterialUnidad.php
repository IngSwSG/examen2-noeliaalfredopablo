<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $fillable = ['idMaterial', 'idUnidad', 'cantidad'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad');
    }
}
