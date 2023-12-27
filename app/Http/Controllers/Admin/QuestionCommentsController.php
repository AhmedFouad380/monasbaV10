<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionComments;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class QuestionCommentsController extends Controller
{
    //
    //
    protected $viewPath = 'Admin.question-comments';
    private $route = 'question-comments';

    public function __construct(QuestionComments $model)
    {
        $this->objectName = $model;
    }

    public function index($id)
    {
        return view($this->viewPath . '.index',compact('id'));
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
            ->editColumn('user_name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->User->name .  ' KD</span>';
                return $name;
            })
            ->editColumn('question', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->Question->description .  ' KD</span>';
                return $name;
            })

            ->rawColumns([ 'checkbox', 'user_name','question'])
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
        $data['status'] = $request->status;
        $this->objectName::where('id', $request->id)->update($data);
        return 1;
    }
}
