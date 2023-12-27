<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $viewPath = 'Admin.Setting';
    private $route = 'Setting';

    public function __construct(Setting $model)
    {
        $this->objectName = $model;
    }

    public function index()
    {
        $Setting = Setting::find(1);
        return view($this->viewPath . '.index',compact('Setting'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request)
    {
        $data = $request->validated();
        $result = $this->objectName::whereId(1)->first();
        $result->update($data);

        /*        editLog($result, 1, $this->route, "#", $result->ar_name);*/
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
    public function getCurrencies($id){
        $currencies = Currency::where('country_id',$id)->get();
        return view('Admin.products.links.currencies',compact('currencies'));
    }
}
