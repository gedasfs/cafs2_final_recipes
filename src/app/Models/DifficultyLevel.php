<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DifficultyLevel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function recipes() : HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
