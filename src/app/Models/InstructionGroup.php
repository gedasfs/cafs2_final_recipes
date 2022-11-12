<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstructionGroup extends Model
{
    use HasFactory;

    public function instructions() : HasMany
    {
        return $this->hasMany(Instruction::class);
    }

    public function recipe() : BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
