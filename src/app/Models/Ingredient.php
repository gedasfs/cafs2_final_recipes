<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

    public function ingredientGroup() : BelongsTo
    {
        return $this->belongsTo(IngredientGroup::class);
    }
}
