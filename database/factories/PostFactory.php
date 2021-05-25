<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $uuid = Uuid::uuid4();
        $title = $this->faker->words(3, true);

        return [
            'title' => $title,
            'summary' => $this->faker->paragraph(3),
            'body' => $this->faker->paragraph(12),
            'active' => 1,
            'published_at' => now()->subDays(rand(0, 5)),
            'uuid' => $uuid,
            'slug' => Str::slug($title) . '-' . $uuid->toString(),
            'user_id' => User::factory(),
        ];
    }
}
