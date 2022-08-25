<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Personnel extends Model
{    
    use HasFactory;

    protected $table='personnels';
    protected $primaryKey = 'id';
    protected $fillable = ['Soustrait', 'Role', 'Salaire', 'CarteID', 'EtatCompte','Adresse'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
