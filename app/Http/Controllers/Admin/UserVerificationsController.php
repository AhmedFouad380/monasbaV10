<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserVerificationsController extends Controller
{
    //
    //
    protected $viewPath = 'Admin.user-verifications';
    private $route = 'user-verifications';

    public function __construct(UserVerification $model)
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
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input selector checkbox" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('country', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Country->name .  '</span>';
                return $name;
            })
            ->editColumn('user_name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->User->name .  '</span>';
                return $name;
            })
            ->editColumn('phone', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->User->phone .  '</span>';
                return $name;
            })
            ->addColumn('status', $this->viewPath . '.parts.active_btn')
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url( "/users/edit/" . $row->user_id) . '" class="btn btn-active-light-info">' . '<i class="bi bi-building"></i>  </a>';
                $actions .= ' <a href="' . $row->file . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> اعرض الملف </a>';

                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'status','user_name','country','phone'])
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
        return view($this->viewPath . '.create');
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
                delLog($result, 1, $this->route, $result->name);
            }*/

            $this->objectName::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function changeActive(Request $request)
    {
        $data['is_approved'] = $request->is_approved;
        $this->objectName::where('id', $request->id)->update($data);
        return 1;
    }
}
