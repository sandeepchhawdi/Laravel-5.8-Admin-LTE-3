<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'title' => 'Video Title 1',
            'published' => true,
        ]);
        
        Video::create([
            'title' => 'Video Title 2',
            'published' => true,
        ]);

        Video::create([
            'title' => 'Video Title 3',
            'published' => false,
        ]);

        Video::create([
            'title' => 'Video Title 4',
            'published' => true,
        ]);

        Video::create([
            'title' => 'Video Title 5',
            'published' => true,
        ]);

        Video::create([
            'title' => 'Video Title 6',
            'published' => false,
        ]);
    }
}
