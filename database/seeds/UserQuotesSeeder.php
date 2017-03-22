<?php

use Illuminate\Database\Seeder;

class UserQuotesSeeder extends Seeder
{
    public function run()
    {
        // Creating admin.
        factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'example@email.com',
            'password' => bcrypt('foobar'),
            'admin' => true
        ]);

        factory(App\User::class)->create([
            'name' => 'Random',
            'email' => 'example2@email.com',
            'password' => bcrypt('foobar'),
        ]);

        $users = factory(App\User::class, 10)->create();

        // Creating basic categories.
        $categories = ['Motivational', 'Inspirational', 'Life', 'Love', 'Positive', 'Funny', 'Friendship', 'Success', 'Happiness'];
        foreach($categories as $category ) {
            factory(App\Category::class)->create(['name' => $category]);
        }
        factory(App\Author::class, 10)->create();
        foreach($users as $user) {
            $user_quotes = factory(App\Quote::class, 8)->create([
                'user_id' => $user->id,
                'author_id' => rand(1,10)
            ]);
            $posts[] = $user_quotes[0];
            $posts[] = $user_quotes[1];
        }
    }
}
