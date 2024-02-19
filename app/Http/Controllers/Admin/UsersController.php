<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    protected $viewPath = 'Admin.users';
    private $route = 'users';

    public function __construct(User $model)
    {
        $this->objectName = $model;
    }

    public function index()
    {
        return view($this->viewPath . '.index');
    }


    public function datatable(Request $request)
    {
        $data = $this->objectName::orderBy('id', 'desc')->withTrashed();

        if ($request->phone) {
            $data = $data->where('phone', $request->phone);
        }
        if ($request->country_id) {
            $data = $data->where('country_id', $request->country_id);
        }
        if ($request->state_id) {
            $data = $data->where('state_id', $request->state_id);
        }
        if ($request->phone) {
            $data = $data->where('city_id', $request->city_id);
        }
        if ($request->status) {
            $data = $data->where('status', $request->status);
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
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url($this->route . "/edit/" . $row->id) . '" class="btn btn-active-light-info">' . trans('lang.edit') . '<i class="bi bi-pencil-fill"></i>  </a>';
                return $actions;

            })
            ->addColumn('user_phone', function ($row) {
                $phone =  $row->phone;
                return $phone;
            })
            ->rawColumns(['actions', 'checkbox', 'status', 'user_phone'])
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

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = Carbon::now();
        $result = $this->objectName::create($data);

//        createLog($result, 1, $this->route, "#", $result->first_name);
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
    public function update(UserRequest $request)
    {
        $edit = $this->objectName::find($request->id);

        $data = $request->validated();
        if(!isset($request->password)){
            unset($data['password']);
        }
        $result = $this->objectName::whereId($request->id)->first();
        $result->update($data);

//        editLog($result, 1, $this->route, "#", $result->first_name);
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
        $results = $this->objectName::whereIn('id', $request->id)->get();
        Product::where('user_id',$request->id)->delete();

        $this->objectName::whereIn('id', $request->id)->forceDelete();

        try {
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
