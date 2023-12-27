<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            Category::create([
                'name_ar' => 'احذية',
                'name_en' => 'shoes',
                'image' => 'sheo@3x.png',
                'status'=>'active'
            ]);
            Category::create([
                'name_ar' => 'فساتين',
                'name_en' => 'dresses',
                'image' => 'dress@3x.png',
                'status'=>'active'
            ]);
            Category::create([
                'name_ar' => 'شنط',
                'name_en' => 'bags',
                'image' => 'bag@3x.png',
                'status'=>'active'
            ]);
            Category::create([
                'name_ar' => 'ساعات',
                'name_en' => 'watches',
                'image' => 'watches@3x.png',
                'status'=>'active'
            ]);
            Category::create([
                'name_ar' => 'اكسسورات',
                'name_en' => 'accessories jewelry',
                'image' => 'jew@3x.png',
                'status'=>'active'
            ]);
            SubCategory::create([
                'name_ar' => 'احذية نسائية',
                'name_en' => 'female shoes',
                'image' => 'Layer -64.png',
                'status'=>'active',
                'category_id'=>1
            ]);
            SubCategory::create([
                'name_ar' => 'احذية كعب',
                'name_en' => 'heel shoes',
                'image' => 'Layer -65@3x.png',
                'status'=>'active',
                'category_id'=>1
            ]);
            SubCategory::create([
                'name_ar' => 'فساتين افراح ',
                'name_en' => ' wedding dresses',
                'image' => 'Layer -2@3x.png',
                'status'=>'active',
                'category_id'=>2

            ]);
            SubCategory::create([
                'name_ar' => 'فساتين سواريه ',
                'name_en' => '  dresses',
                'image' => 'Layer -2@3x.png',
                'status'=>'active',
                'category_id'=>2

            ]);


        }
    }
}
