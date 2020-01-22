<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory('App\User', 10)->create();

        $users->each(function ($user) {
            $threads = factory('App\Thread', 5)->create([
                'user_id' => $user->id
            ]);

            $threads->each(function ($thread) {
                factory('App\Reply', 5)->create([
                    'thread_id' => $thread->id
                ]);
            });
        });
    }
}
