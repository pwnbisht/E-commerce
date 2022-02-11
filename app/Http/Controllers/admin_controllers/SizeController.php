<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //return size list page
    public function index()
    {
        $result = Size::all();
        return view('admin.size', ['data' => $result]);
    }



    //return add size page 
    //or update size
    public function manage_size($id = '')
    {
        if ($id > 0) {
            $arr = Size::where(['id' => $id])->get();

            $result['id'] = $arr['0']->id;
            $result['size'] = $arr['0']->size;
            $result['status'] = $arr['0']->status;
        } else {
            $result['size'] = "";
            $result['status'] = "";
            $result['id'] = 0;
        }

        return view('admin/manage_size', $result);
    }




    // insert data into db from add size page
    //or update data in DataBase
    public function manage_size_process(Request $request)
    {

        //validate the data 
        $request->validate([
            'size' => 'required|unique:sizes,size,'. $request->post('id'),
            
            // 'code' => 'required|unique:coupons,code,' . $request->post('id'),
        ]);


        //update data in db (update page)
        if ($request->post('id') > 0) {
            $model = Size::find($request->post('id'));
            $msg = "Size Updated";
        } else {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Size();
            $msg = "Size Inserted";
        }

        $model->size = $request->post('size');
        $model->status = 1;     //giving the default value
        $model->save();


        //Session
        $request->session()->flash('message', $msg);
        return redirect('admin/size');
    }



    //delete size from list(table)
    public function delete_size(Request $request, $id)
    {
        $model = Size::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message', 'Size Removed');
        return redirect('admin/size');
    }


    //change size status
    public function status(Request $request, $status, $id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();

        //Session
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/size');
    }
}
