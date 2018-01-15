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
       /* factory(App\User::class, 5)->create()
        ->each(function ($user) {
    		$user->articles()->save(factory(App\Article::class)->make());
		});*/
    factory(App\User::class, 5)->create()
        ->each(function ($user) {
            $user->articles()->save(factory(App\Article::class, 2)
                ->make()
                ->each(function ($article) {
                    $article->comments()->save(factory(App\Comment::class)->make());
                }));
        });
    }
}

