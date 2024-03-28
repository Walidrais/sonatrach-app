<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'periode',
        'chef_complex',
        'etat',
    ];


    public function chefComplex()
    {
        return $this->belongsTo(User::class, 'chef_complex');
    }

    public function chefIdc()
    {
        return $this->belongsTo(User::class, 'chef_idc');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent');
    }

    public function citernes()
    {
        return $this->belongsToMany(Citerne::class);
    }

    public function camions()
    {
        return $this->belongsToMany(Camion::class);
    }

    public function chauffeurs()
    {
        return $this->belongsToMany(Chauffeur::class);
    }

    public function convoyeurs()
    {
        return $this->belongsToMany(Convoyeur::class);
    }

}
