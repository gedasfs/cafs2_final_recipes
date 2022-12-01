<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Recipe extends Model
{
    use HasFactory;

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function difficultyLevel() : BelongsTo
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    public function images() : MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function ingredients() : HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function instructions() : HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    public function prepTimeUnit() : BelongsTo
    {
        return $this->belongsTo(RecipeTimeUnit::class);
    }

    public function cookTimeUnit() : BelongsTo
    {
        return $this->belongsTo(RecipeTimeUnit::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'recipes_tags');
    }

    public function favorites() : MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function ratings() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'recipes_ratings')->withPivot('rating');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
