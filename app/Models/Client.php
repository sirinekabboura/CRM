<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='clients';
    protected $primaryKey = 'id';
    protected $fillable = ['RaisonSociale', 'Logo', 'Etats', 'RNE', 'Personnephysique', 'Adresse'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}