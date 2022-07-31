<?php

namespace App\Models;

use App\Models\Equipe;
use App\Models\Projet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','membres','projet' ,'pseudo' ,'code','NomProjet'
    ];
    public function projets(){
        return $this->belognsTo(Projet::class );
    }
}
