<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'quote' => $this->faker->sentence,
            'biograph' => $this->faker->paragraph,
            'image' => 'persons/' . $this->faker->image('public/storage/persons', 400, 300, null, false),
            'date' => $this->faker->date,
            'user_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
