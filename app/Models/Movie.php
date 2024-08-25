<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'director', 'genre', 'release_year', 'description',];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function ratings()
        {
            return $this->hasMany(Rating::class);
        }
}
