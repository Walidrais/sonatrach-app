<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Convoyeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'num_carte_id',
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
