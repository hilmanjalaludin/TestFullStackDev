<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Posts::factory(15)->create();
        
    }
}
