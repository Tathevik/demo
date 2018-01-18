<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->articles()->saveMany(factory(App\Article::class, 2)->make())->each(function ($article) {
                $article->reviews()->saveMany(factory(App\Review::class, 3)->make());
            });
        });
    }
}

