<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comments;

class CommentsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Comments::factory(10)->create();
        
    }
}
