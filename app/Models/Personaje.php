<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Personaje extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'unidad_especial', 'vida', 'velocidad'];

    public function armas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Arma::class);
    }

}

