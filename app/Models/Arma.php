<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arma extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'daño', 'cadencia', 'personaje_id']; //puede ser que sea id_personaje

    public function personaje(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Personaje::class);
    }

}
