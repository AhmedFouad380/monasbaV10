<?php

namespace Database\Seeders;

use App\Models\Ads;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ads::create([
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17092229655558.jpg',
            'status'=>'active'
        ]);

        Ads::create([
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17092229742965.jpg',
            'status'=>'active'
        ]);
        Ads::create([
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17092229838937.jpg',
            'status'=>'active'
        ]);
        Ads::create([
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17092229947863.jpg',
            'status'=>'active'
        ]);
    }
}
