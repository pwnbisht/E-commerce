<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use App\Models\admin_models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    //return category table page
    public function index()
    {
        $result = Category::all();
        return view('admin.category',['data'=>$result]);
    }


    //return add category page 
    //or update category
    public function manage_category($id='')
    {
        if($id>0){
            $arr = Category::where(['id'=>$id])->get();


            $result['id']= $arr['0']->id;
            $result['category_name']= $arr['0']->category_name;
            $result['category_slug']= $arr['0']->category_slug;
            $result['paarent_category_id']= $arr['0']->paarent_category_id;
            $result['category_image']= $arr['0']->category_image;
            $result['is_home']= $arr['0']->is_home;

            $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();
            
        }
        else
        {
            $result['category_name']="";
            $result['category_slug']="";
            $result['id']= "0";
            $result['category_slug']= '';
            $result['paarent_category_id']= '';
            $result['is_home']= '';
            $result['category_image']= '';
            $result['category']=DB::table('categories')->where(['status'=>1])->get();

        }
        

        return view('admin/manage_category',$result);
        
    }


    // insert data into db from add category page
    //or update data in DataBase
    public function manage_category_process(Request $request)
    {

        //validate the data 
        
        $request->validate([
            'category_name'=>'required',
            'category_image'=>"mimes:jpeg,jpg,png",
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);


        //update data in db (update page)
        if($request->post('id')>0)
        {
            $model = Category::find($request->post('id'));
            $msg = "Category Updated";
        }

        else
        {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Category();
            $msg = "Category Inserted";

        }

        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->is_home = 0;
        if($request->post('is_home')!=null){
            $model->is_home = 1;
        }
        
        $model->paarent_category_id = $request->post('paarent_category_id');

        if($request->hasFile("category_image")){
            $rand=rand('111111111','999999999');
            $category_image=$request->file("category_image");
            $ext=$category_image->extension();
            $image_name=$rand.'.'.$ext;
            $request->file("category_image")->storeAs('/public/media/category',$image_name);
            $model->category_image=$image_name;
        }

        $model->status = 1;

        $model->save();
        

        //Session
        $request->session()->flash('message',$msg);
        return redirect('admin/category');

    }

    //delete category from list(table)
    public function delete_category(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }


    //change category status
    public function status(Request $request, $status, $id)
    {
        $model = Category::find($id);
        $model->status=$status;
        $model->save();

        //Session
        $request->session()->flash('message','Status Updated');
        return redirect('admin/category');
    }


}
