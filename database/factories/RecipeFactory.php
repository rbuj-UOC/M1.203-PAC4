<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/*
    private function resolveURL($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch);

        if ($finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL))
            return $finalUrl;
        return $url;
    }


    $faker = Faker::create('');
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        for ($i = 0; $i < 100; $i++) {
            $paragraphs = $faker->paragraphs(rand(2, 6));
            $instructions = "";
            foreach ($paragraphs as $para) {
                $instructions .= "<p>{$para}</p>";
            }
            DB::table('recipes')->insert([
                'name' => rtrim($faker->sentence(rand(3, 8)), '.'),
                'posted_at' => $faker->dateTimeBetween($startDate = '-6 months', $endDate = 'now')->format('Y-m-d H:i:s'),
                'level' => $faker->randomElement(['bajo', 'medio', 'alto']),
                'preparation_minutes' => $faker->numberBetween(5, 120),
                'ingredients' => $faker->word(),
                'author' => $faker->name,
                'instructions' => $instructions,
                'picture' => $this->resolveURL($faker->imageUrl($width = 640, $height = 480, ['receta']))
            ]);
            $row->categories()->attach(Category::inRandomOrder()->limit(2)->pluck('id'));
        }
 */

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => rtrim(fake()->sentence(rand(3, 8)), '.'),
            'posted_at' => fake()->dateTimeBetween($startDate = '-6 months', $endDate = 'now')->format('Y-m-d H:i:s'),
            'level' => fake()->randomElement(['bajo', 'medio', 'alto']),
            'preparation_minutes' => fake()->numberBetween(5, 120),
            'ingredients' => fake()->word(),
            'author' => fake()->name,
            'instructions' => implode('<br>', fake()->paragraphs(rand(2, 6))),
            'picture' => fake()->imageUrl(640, 480, 'receta')
        ];
    }
}
