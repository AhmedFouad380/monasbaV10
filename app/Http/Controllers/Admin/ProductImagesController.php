<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductImageRequest;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductImagesController extends Controller
{
    protected $viewPath = 'Admin.product-images';
    private $route = 'product-images';

    public function __construct(ProductImages $model)
    {
        $this->objectName = $model;
    }

    public function index($id)
    {
        return view($this->viewPath . '.index',compact('id'));
    }


    public function datatable(Request $request)
    {
        $data = $this->objectName::orderBy('id', 'desc')->where('product_id',$request->id);

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input selector checkbox" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->rawColumns(['checkbox'])
            ->make();

    }

    public function table_buttons($id)
    {
        return view($this->viewPath . '.button',compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view($this->viewPath . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProductImageRequest $request)
    {
        $data = $request->validated();
        foreach ($request->images as $image){
            $productImage = new ProductImages();
            $productImage->product_id = $request->product_id;
            $productImage->image = $image;
            $productImage->save();
        }

//        createLog($result, 1, $this->route, "#", $result->ar_name);
        return redirect(route($this->route . '.index',$request->product_id))->with('message', trans('lang.added_s'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            /*$results = $this->objectName::whereIn('id', $request->id)->get();
            foreach ($results as $key => $result) {
                delLog($result, 1, $this->route, $result->ar_name);
            }*/

            $this->objectName::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


}
