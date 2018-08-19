<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CommentTableSeeder extends Seeder
{
    public function run()
    {
         factory(App\Comment::class, 4)->create();

    }
}
