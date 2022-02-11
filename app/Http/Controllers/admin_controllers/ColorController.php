<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //return color list page
    public function index()
    {
        $result = Color::all();
        return view('admin.color', ['data' => $result]);
    }



    //return add color page 
    //or update color
    public function manage_color($id = '')
    {
        if ($id > 0) {
            $arr = Color::where(['id' => $id])->get();

            $result['id'] = $arr['0']->id;
            $result['color'] = $arr['0']->color;
            $result['status'] = $arr['0']->status;
        } else {
            $result['color'] = "";
            $result['status'] = "";
            $result['id'] = 0;
        }

        return view('admin/manage_color', $result);
    }




    // insert data into db from add color page
    //or update data in DataBase
    public function manage_color_process(Request $request)
    {

        //validate the data 
        $request->validate([
            'color' => 'required|unique:colors,color,'. $request->post('id'),
            
            // 'code' => 'required|unique:coupons,code,' . $request->post('id'),
        ]);


        //update data in db (update page)
        if ($request->post('id') > 0) {
            $model = Color::find($request->post('id'));
            $msg = "Color Updated";
        } else {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Color();
            $msg = "Color Inserted";
        }

        $model->color = $request->post('color');
        $model->status = 1;     //giving the default value
        $model->save();


        //Session
        $request->session()->flash('message', $msg);
        return redirect('admin/color');
    }



    //delete color from list(table)
    public function delete_color(Request $request, $id)
    {
        $model = Color::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message', 'Color Removed');
        return redirect('admin/color');
    }


    //change color status
    public function status(Request $request, $status, $id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();

        //Session
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/color');
    }
}
