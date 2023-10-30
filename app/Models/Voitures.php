<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voitures extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matricule',
        'marque',
        'categorie',
        'prix',
        'isvendu'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, user_id, id);
    }
}
