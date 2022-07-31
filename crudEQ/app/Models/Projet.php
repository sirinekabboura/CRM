<?php

namespace App\Models;

use App\Models\Equipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'NomProjet','Equipe','Etat', 'Deadline'
    ];
    public function equipes(){
        return $this->hasMany(Equipe::class ,'NomProjet','name');
    }

}
