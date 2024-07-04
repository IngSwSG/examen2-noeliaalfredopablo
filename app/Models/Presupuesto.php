<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $fillable = ['nombrePresupuesto'];

    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'codigoPresupuesto');
    }
}
