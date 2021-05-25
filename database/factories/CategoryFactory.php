<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class CategoryFactory extends Factory
{
    /** @var string */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uuid = Uuid::uuid4();
        $name = $this->faker->words(1, true);

        return [
            'name' => $name,
            'uuid' => $uuid,
            'slug' => Str::slug($name) . '-' . $uuid->toString(),
        ];
    }
}
