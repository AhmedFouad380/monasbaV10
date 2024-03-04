<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'title_ar'=>'اخر موضة',
            'title_en'=>'اخر موضة',
            'description_ar'=>'لقد أنشأنا تصميمًا يبدو رائعًا ويعمل ببراعة ويستشعر التوجهات.',
            'description_en'=>'We have created a Design that looks Awesome, performs Brilliantly & senses Orientations.',
            'button_ar'=>'حمل التطبيق',
            'button_en'=>'Get App',
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17091280413007.jpg',
            'status'=>'active'
        ]);
        Slider::create([
            'title_ar'=>'اخر موضة',
            'title_en'=>'اخر موضة',
            'description_ar'=>'لقد أنشأنا تصميمًا يبدو رائعًا ويعمل ببراعة ويستشعر التوجهات.',
            'description_en'=>'We have created a Design that looks Awesome, performs Brilliantly & senses Orientations.',
            'button_ar'=>'حمل التطبيق',
            'button_en'=>'Get App',
            'link'=>'https://monsbah.afkarq8.com/',
            'image'=>'user_17091280413007.jpg',
            'status'=>'active'
        ]);
    }
}
