<?php

namespace App\Http\Requests\Recipes;

use App\Models\Category;
use App\Models\RecipeTimeUnit;
use App\Models\DifficultyLevel;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:128'],
            'short_description' => ['nullable','string', 'min:5', 'max:255'],
            'description' => ['nullable', 'string', 'min:5', 'max:10240'],
            'category_id' => ['required', sprintf('exists:%s,id', Category::class)],
            'difficulty_level_id' => ['required', sprintf('exists:%s,id', DifficultyLevel::class)],
            'tags' => ['nullable', 'string', 'min:3'],
            'prep_time' => ['required', 'string', 'max:16'],
            'cook_time' => ['required', 'string', 'max:16'],
            'total_time' => ['required', 'string', 'max:16'],
            'recipe_time_unit_id' => ['required', sprintf('exists:%s,id', RecipeTimeUnit::class)],
            'servings' => ['required', 'numeric', 'integer'],

            'ingredient_id.*'  => ['nullable'],

            'ingredient_name'  => ['required', 'array', 'min:1'],
            'ingredient_name.*'  => ['required', 'string'],

            'ingredient_quantity'  => ['required', 'array', 'min:1'],
            'ingredient_quantity.*'  => ['required', 'string'],

            'ingredient_unit'  => ['required', 'array', 'min:1'],
            'ingredient_unit.*'  => ['required', 'string'],

            'instruction_id.*'  => ['nullable'],

            'instruction_description'  => ['required', 'array', 'min:1'],
            'instruction_description.*'  => ['required', 'string'],

            'delete_imageable_id' => ['nullable', 'array', 'min:1'],
            'delete_imageable_id.*' => ['nullable'],

            'recipe_photos' => [File::image()->max(10*1024)],

            'ext_url' => ['nullable', 'url'],
        ];
    }
}
