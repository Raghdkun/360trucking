<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carousel::create([
            'title' => '#1 Place For Your Logistics Solution',
            'description' => 'example1',
            'button_text' => 'Read More',
            'button_url' => '/',
            'image' => 'assets/img/carousel-1.jpg',
        ]);

        Carousel::create([
            'title' => '#1 Place For Your Transport Solution',
            'description' => 'example2',
            'button_text' => 'Read More',
            'button_url' => '/',
            'image' => 'assets/img/carousel-2.jpg',
        ]);
    }
}
