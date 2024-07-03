<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Category;
use Faker\Factory as Faker;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numCategories = 2;

        // create 100 randon recipes
        $recipes = Recipe::factory(100)
            ->create();

        // associate each generated recipes with 2 categories
        foreach ($recipes as $recipe) {
            $categories = Category::inRandomOrder()->limit($numCategories)->pluck('id');
            $recipe->categories()->attach($categories);
        }
    }
}
