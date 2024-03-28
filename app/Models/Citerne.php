<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Citerne extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
    ];

    public function demandes()
{
    return $this->belongsToMany(Demande::class);
}

public function autorisations(): HasMany
{
    return $this->hasMany(Autorisation::class);
}

}
