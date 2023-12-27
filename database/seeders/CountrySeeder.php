<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Country::count() == 0) {
            Country::create([
                'name_ar' => 'الكويت',
                'name_en' => 'Kuwait',
                'status'=>'active'
            ]);
            Country::create([
                'name_ar' => 'مصر',
                'name_en' => 'egypt',
                'status'=>'active'
            ]);
            Country::create([
                'name_ar' => 'السعودية',
                'name_en' => 'Saudi Arabia',
                'status'=>'active'
            ]);

            City::create([
                'name_ar' => 'السالمية',
                'name_en' => 'Salmiya',
                'country_id' => 1,
                'status'=>'active'
            ]);
            City::create([
                'name_ar' => 'الفراونية',
                'name_en' => 'Al Farwaniyah',
                'country_id' => 1,
                'status'=>'active'
            ]);
            City::create([
                'name_ar' => 'القاهره',
                'name_en' => 'Cairo',
                'country_id' => 2,
                'status'=>'active'
            ]);
            City::create([
                'name_ar' => 'الغربية',
                'name_en' => 'Western',
                'country_id' => 2,
                'status'=>'active'
            ]);

            State::create([
                'name_ar' => 'المعادي',
                'name_en' => 'maadi',
                'city_id' => 3,
                'status'=>'active'
            ]);
            State::create([
                'name_ar' => 'الاحمدي',
                'name_en' => 'Ahmadi',
                'city_id' => 1,
                'status'=>'active'
            ]);
            Currency::create([
                'name_ar'=>'دينار',
                'name_en'=>'Dinar',
                'status'=>'active',
                'country_id'=>1
            ]);

        }
    }
}
