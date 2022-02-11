<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Brand;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class BrandController extends Controller
{
    //return brand list page
    public function index()
    {
        $result = Brand::all();
        return view('admin.brand', ['data' => $result]);
    }



    //return add brand page 
    //or update brand
    public function manage_brand($id = '')
    {
        if ($id > 0) {
            $arr = Brand::where(['id' => $id])->get();

            $result['id'] = $arr['0']->id;
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['is_home'] = $arr['0']->is_home;
            $result['status'] = $arr['0']->status;
        } else {
            $result['name'] = "";
            $result['image'] = "";
            $result['status'] = "";
            $result['is_home']='';
            $result['id'] = 0;
        }

        return view('admin/manage_brand', $result);
    }




    // insert data into db from add brand page
    //or update data in DataBase
    public function manage_brand_process(Request $request)
    {

        //validate the data 
        // if($request->post('id')>0){
        //     $image_validation="mimes:jpeg,jpg,png";
        // }else{
        //     $image_validation="required|mimes:jpeg,jpg,png";
        // }
        $request->validate([
            
            'name'=>'required|unique:brands,name,'.$request->post('id'),
            // 'image'=>$image_validation,
            'image'=> "mimes:jpeg,jpg,png"
        ]);


        //update data in db (update page)
        if ($request->post('id') > 0) {
            $model = Brand::find($request->post('id'));
            $msg = "Brand Updated";
        } else {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Brand();
            $msg = "Brand Inserted";
        }

        $model->name = $request->post('name');

        $model->is_home = 0;
        if($request->post('is_home')!=null){
            $model->is_home = 1;
        }

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('\public\media\brands',$image_name);
            $model->image=$image_name; 
        }

        $model->status = 1;     //giving the default value
        $model->save();


        //Session
        $request->session()->flash('message', $msg);
        return redirect('admin/brand');
    }



    //delete color from list(table)
    public function brand(Request $request, $id)
    {
        $model = Brand::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message', 'Brand Removed');
        return redirect('admin/brand');
    }


    //change color status
    public function status(Request $request, $status, $id)
    {
        $model = Brand::find($id);
        $model->status = $status;
        $model->save();

        //Session
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/brand');
    }
}
