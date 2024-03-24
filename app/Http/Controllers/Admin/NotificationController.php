<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\NotificationRequest;
use App\Jobs\sendEmail;
use App\Mail\sendUserNotifcation;
use App\Models\Category;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use function Monolog\Formatter\format;

class NotificationController extends Controller
{
    protected $viewPath = 'Admin.Notification';
    private $route = 'Notification';

    public function __construct(Notification $model)
    {
        $this->objectName = $model;
    }

    public function index()
    {
        return view($this->viewPath . '.index');
    }


    public function datatable(Request $request)
    {
        $data = $this->objectName::orderBy('id', 'desc')->where('type','admin');
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input selector checkbox" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('user', function ($row) {
                $actions = $row->User->name ;
                return $actions;

            })
            ->addColumn('date', function ($row) {
                $actions = Carbon::parse($row->created_at)->format('Y-m-d H:i') ;
                return $actions;

            })
            ->rawColumns([ 'checkbox','date'])
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

    public function store(NotificationRequest $request)
    {
        $data = $request->validated();
        $users = $data['user_id'];
        $data['type']='admin';
//        $data['name_en']=$data['name_ar'];
        $token = [];
        if($request->type = 1){
            if(is_array($users,0)){
                $token = User::plunk('fcm_token');
                send($token,'مناسبة ( اشعار من قبل الادارة )',$data['name_ar'],null,'admin');

            }else{
                    $token = User::whereIn('id',$users)->plunk('fcm_token');
                send($token,'مناسبة ( اشعار من قبل الادارة )',$data['name_ar'],null,'admin');

            }
        }else{
            if(is_array($users,0)){
                $usersa = User::OrderBy('id','desc')->get();
                foreach($usersa as $user){
                dispatch(new sendUserNotifcation($user));
                }
            }else{
                $users = User::whereIn('id',$users)->get();
                foreach($users as $user){
                    dispatch(new sendUserNotifcation($user));
                }
            }
        }

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
    public function update(CategoryRequest $request)
    {
        $data = $request->validated();
        if (is_file($request->image)) {
            $video = upload($request->image, 'categories');
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
//            $results = $this->objectName::whereIn('id', $request->id)->get();
//            foreach ($results as $key => $result) {
//                delLog($result, 1, $this->route, $result->ar_name);
//            }

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
