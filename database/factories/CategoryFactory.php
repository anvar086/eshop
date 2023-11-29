<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
//protected $model = Category::class;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cat_name = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($cat_name);
        return [
            'name' => $cat_name,
            'slug' => $slug,
        ];
    }
}
