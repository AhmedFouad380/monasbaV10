<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\State;
use App\Models\SubCategory;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row[0]);
        if(ProductImages::where('id',$row[0])->count() == 1 && isset($row[2])) {
         ProductImages::where('id',$row[0])->update([
            'image'    => $row[2],
        ]);
        }
    }
}
