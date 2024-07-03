<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\View\View;

class RecipeController extends Controller
{
    /**
     * Show 5 recipes: 2 fixed + 3 random
     */
    public function index(): View
    {
        $fixed = [1, 2];
        $random = Recipe::select('id')->where('id', '>', 2)->orderByRaw('RAND()')->take(3)->pluck('id')->toArray();
        $array = array_merge($fixed, $random);
        return view('home', [
            'recipes' => Recipe::find($array)
        ]);
    }

    /**
     * Show the recipe for a given id.
     */
    public function show(string $id): View
    {
        return view('recipe.content', [
            'recipe' => Recipe::findOrFail($id)
        ]);
    }

    public function apiRecipe(string $id)
    {
        $recipe = Recipe::find($id);
        return response()->json($recipe, !empty($recipe) ? 200 : 400);
    }

    public function apiRecipes(string $page)
    {
        $recipes = Recipe::paginate($perPage = 10, $columns = ['id','name', 'posted_at'], $pageName = 'page', $page);
        if (!empty($recipes)) {
            $data = $recipes->toArray()['data'];
            return response()->json($data, 200);
        }
        return response()->json([], 400);
    }

    public function apiCategory(string $id, string $page)
    {
        $recipes = Recipe::whereHas('categories', fn ($query) => $query->where('category_id', $id))->paginate($perPage = 10, $columns = ['id', 'name', 'posted_at'], $pageName = 'page', $page);
        if (!empty($recipes)) {
            $data = $recipes->toArray()['data'];
            return response()->json($data, 200);
        }
        return response()->json([], 400);
    }
}
