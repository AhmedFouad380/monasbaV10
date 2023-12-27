<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Product::count() == 0){

            Product::create([
                'name_ar'=>'فساتين زفاف محجبات',
                'name_en'=>'Veiled wedding dresses',
                'price'=>'200',
                'phone'=>'505505050',
                'status'=>'active',
                'type'=>'sale',
                'active_call'=>'active',
                'active_whatsapp'=>'active',
                'active_chat'=>'active',
                'show_username'=>'active',
                'active_video'=>'inactive',
                'image'=>'Slider.png',
                'currency_id'=>1,
                'category_id'=>2,
                'sub_category_id'=>3,
                'country_id'=>1,
                'city_id'=>1,
                'state_id'=>1,
                'user_id'=>1,
                'description_ar'=>'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة ',
                'description_en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);
            Product::create([
                'name_ar'=>'فساتين زفاف محجبات',
                'name_en'=>'Veiled wedding dresses',
                'price'=>'200',
                'phone'=>'505505050',
                'status'=>'active',
                'type'=>'sale',
                'active_call'=>'active',
                'active_whatsapp'=>'active',
                'active_chat'=>'active',
                'show_username'=>'active',
                'active_video'=>'inactive',
                'image'=>'Slider.png',
                'category_id'=>2,
                'currency_id'=>1,
                'sub_category_id'=>3,
                'country_id'=>1,
                'city_id'=>1,
                'state_id'=>1,
                'user_id'=>1,
                'description_ar'=>'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة ',
                'description_en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);
            Product::create([
                'name_ar'=>'فساتين زفاف محجبات',
                'name_en'=>'Veiled wedding dresses',
                'price'=>'200',
                'phone'=>'505505050',
                'status'=>'active',
                'type'=>'sale',
                'active_call'=>'active',
                'active_whatsapp'=>'active',
                'active_chat'=>'active',
                'show_username'=>'active',
                'active_video'=>'inactive',
                'image'=>'Slider.png',
                'currency_id'=>1,
                'category_id'=>2,
                'sub_category_id'=>3,
                'country_id'=>1,
                'city_id'=>1,
                'state_id'=>1,
                'user_id'=>1,
                'description_ar'=>'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة ',
                'description_en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);
            Product::create([
                'name_ar'=>'فساتين زفاف محجبات',
                'name_en'=>'Veiled wedding dresses',
                'price'=>'200',
                'phone'=>'505505050',
                'status'=>'active',
                'type'=>'sale',
                'active_call'=>'active',
                'active_whatsapp'=>'active',
                'active_chat'=>'active',
                'show_username'=>'active',
                'active_video'=>'inactive',
                'image'=>'Slider.png',
                'currency_id'=>1,
                'category_id'=>2,
                'sub_category_id'=>3,
                'country_id'=>1,
                'city_id'=>1,
                'state_id'=>1,
                'user_id'=>1,
                'description_ar'=>'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة ',
                'description_en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);
            Product::create([
                'name_ar'=>'فساتين زفاف محجبات',
                'name_en'=>'Veiled wedding dresses',
                'price'=>'200',
                'phone'=>'505505050',
                'status'=>'active',
                'type'=>'sale',
                'active_call'=>'active',
                'active_whatsapp'=>'active',
                'active_chat'=>'active',
                'show_username'=>'active',
                'active_video'=>'inactive',
                'image'=>'Slider.png',
                'currency_id'=>1,
                'category_id'=>2,
                'sub_category_id'=>3,
                'country_id'=>1,
                'city_id'=>1,
                'state_id'=>1,
                'user_id'=>1,
                'description_ar'=>'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة ',
                'description_en'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            ]);

            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>1
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>1
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>1
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>1
            ]);

            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>2
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>2
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>2
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>2
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>3
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>3
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>3
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>3
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>4
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>4
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>4
            ]);
            ProductImages::create([
                'image'=>'Slider.png',
                'product_id'=>4
            ]);
        }
    }
}
