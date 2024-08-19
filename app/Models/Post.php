<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Spécifiez les attributs que vous pouvez remplir via l'assignation de masse
    protected $fillable = ['title', 'content', 'user_id'];

    // Définissez la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
