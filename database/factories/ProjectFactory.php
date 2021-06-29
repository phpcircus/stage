<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase(),
            'description' => $this->faker->paragraph(3),
            'image' => '/img/placeholder.jpg',
            'github_url' => 'https://github.com/phpcircus/' . $this->faker->word(),
            'website_url' => $this->faker->url(),
        ];
    }
}
