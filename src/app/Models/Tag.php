<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function recipes() : BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipes_tags');
    }
}
