<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatesRequest;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StatesController extends Controller
{
    protected $viewPath = 'Admin.states';
    private $route = 'states';

    public function __construct(State $model)
    {
        $this->objectName = $model;
    }

    public function index($id)
    {
        return view($this->viewPath . '.index',compact('id'));
    }


    public function datatable(Request $request)
    {
        $data = $this->objectName::orderBy('id', 'desc')->where('city_id',$request->id);

        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input selector checkbox" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url($this->route . "/edit/" . $row->id) . '" class="btn btn-active-light-info">' . trans('lang.edit') . '<i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'status'])
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

    public function store(StatesRequest $request)
    {
        $data = $request->validated();
        $result = $this->objectName::create($data);

//        createLog($result, 1, $this->route, "#", $result->ar_name);
        return redirect(route($this->route . '.index',$request->city_id))->with('message', trans('lang.added_s'));
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
    public function update(StatesRequest $request)
    {
        $data = $request->validated();
        $result = $this->objectName::whereId($request->id)->first();
        $result->update($data);

//        editLog($result, 1, $this->route, "#", $result->ar_name);
        return redirect(route($this->route . '.index',$result->city_id))->with('message', trans('lang.updated_s'));
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

    public function getStates($id){
        $states = State::where('city_id',$id)->get();
        return view('Admin.products.links.states',compact('states'));
    }
}
