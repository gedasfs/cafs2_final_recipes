<?php

namespace App\Http\Controllers\Pdf;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function recipePdf(Recipe $recipe, RecipeService $recipeService)
    {
        $result = $recipeService->getRecipe($recipe);

        $pdf = Pdf::loadView('components.pdfs.recipe', $result);

        return $pdf->stream('recipe.pdf');
    }
}
