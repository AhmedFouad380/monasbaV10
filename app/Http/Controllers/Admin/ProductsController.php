<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    //
    protected $viewPath = 'Admin.products';
    private $route = 'products';

    public function __construct(Product $model)
    {
        $this->objectName = $model;
    }

    public function index()
    {
        return view($this->viewPath . '.index');
    }


    public function datatable(Request $request)
    {
        $data = $this->objectName::orderBy('id', 'desc');
        if(isset($request->user_id) && $request->user_id != 0){
            $data->where('user_id',$request->user_id);
        }
        if(isset($request->country_id) && $request->country_id != 0){
            $data->where('country_id',$request->country_id);
        }
        if(isset($request->city_id) && $request->city_id != 0){
            $data->where('city_id',$request->city_id);
        }
        if(isset($request->state_id) && $request->state_id != 0){
            $data->where('state_id',$request->state_id);
        }
        if(isset($request->category_id) && $request->category_id != 0){
            $data->where('category_id',$request->category_id);
        }
        if(isset($request->sub_category_id) && $request->sub_category_id != 0){
            $data->where('sub_category_id',$request->sub_category_id);
        }
        if(isset($request->type) && $request->type != 0){
            $data->where('type',$request->type);
        }
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input selector checkbox" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('images', function ($row) {
                $actions = ' <a href="' . url( "/product-images/index/" . $row->id) . '" class="btn btn-active-light-info">' . '<i class="bi bi-building"></i>  </a>';
                return $actions;

            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url($this->route . "/edit/" . $row->id) . '" class="btn btn-active-light-info">' . trans('lang.edit') . '<i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'status','images'])
            ->make();

    }

    public function table_buttons()
    {
        return view($this->viewPath . '.button');
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

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $result = $this->objectName::create($data);

//        createLog($result, 1, $this->route, "#", $result->ar_name);
        return redirect(route($this->route . '.index'))->with('message', trans('lang.added_s'));
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->objectName::findOrFail($id);
        return view($this->viewPath . '.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        $data = $request->validated();
        if (is_file($request->image)) {
            $video = upload($request->image, 'products');
            $data['image'] = $video;
        } else {
            $data['image'] = $request->image;
        }
        $result = $this->objectName::whereId($request->id)->first();
        $result->update($data);

//        editLog($result, 1, $this->route, "#", $result->ar_name);
        return redirect(route($this->route . '.index'))->with('message', trans('lang.updated_s'));
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

    public function changeActive(Request $request)
    {
        $data['status'] = $request->status;
        $this->objectName::where('id', $request->id)->update($data);
        return 1;
    }

}
