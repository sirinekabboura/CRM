<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "desc",
    ];

    public function client(){
        $this->hasMany("App\Models\Client', 'equipe_id'");
    }
}
