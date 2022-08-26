<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "image",
        "id_user",
        "id_tache"
    ];

    
    public function user(){
        return $this->hasOne("App\Models\User", "id_user");
    }
    public function tache(){
        return $this->hasOne("App\Models\Tache", "id_tache");
    }
    public function createdBy(){
        return $this->belongsTo(User::class);
    }
    public function soustaches(){
        return $this->belongsTo(Soustache::class);
    }
    
}
