<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // in case we are refreshing the database we do not need to truncate

        User::truncate();
        Category::truncate();
        Post::truncate();

        // We can also implicitly decide what data will be one not generated with faker
        // This will create a User with fake data but the name will be John Doe.

        //    $user = User::factory()->create([
        //        'name' => 'John Doe'
        //    ]);

        //    Post::factory(5)->create([
        //         'user_id' => $user->id
        //    ]);

    }
}
