<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent',
        'citerne',
        'camion',
        'chauffeur',
        'convoyeur',
    ];

    public function agents()
    {
        return $this->belongsTo(User::class, 'agent');
    }

    public function citernes()
    {
        return $this->belongsTo(Citerne::class, 'citerne');
    }

    public function camions()
    {
        return $this->belongsTo(Camion::class, 'camion');
    }

    public function chauffeurs()
    {
        return $this->belongsTo(Chauffeur::class, 'chauffeur');
    }

    public function convoyeurs()
    {
        return $this->belongsTo(Convoyeur::class, 'convoyeur');
    }
}
