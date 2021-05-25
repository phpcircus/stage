<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (! $admin = User::where('email', config('auth.admin.email'))->first()) {
            Artisan::call('create:admin');

            $admin = User::where('email', config('auth.admin.email'))->first();
        }

        Post::factory(12)->has(Category::factory()->count(rand(1, 3)))
        ->create([
            'user_id' => $admin->id,
        ]);
    }
}
