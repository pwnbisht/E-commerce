<?php

namespace App\Http\Controllers\admin_controllers;
use App\Http\Controllers\Controller;

use App\Models\admin_models\Home_Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
   //return home_banner table page
   public function index()
   {
       $result = Home_Banner::all();
       return view('admin.home_banner',['data'=>$result]);
   }


   //return add home_banner page 
   //or update home_banner
   public function manage_home_banner($id='')
   {
       if($id>0){
           $arr = Home_Banner::where(['id'=>$id])->get();


           $result['id']= $arr['0']->id;
           $result['image']= $arr['0']->image;
           $result['btn_text']= $arr['0']->btn_text;
           $result['btn_link']= $arr['0']->btn_link;
           $result['off']= $arr['0']->off;
           $result['banner_name']= $arr['0']->banner_name;
           $result['banner_about']= $arr['0']->banner_about;
           $result['status']= $arr['0']->status;

          
           
       }
       else
       {
            $result['id']= 0;
           $result['image']="";
           $result['btn_text']= '';
           $result['btn_link']= '';
           $result['off']= '';
           $result['banner_name']= '';
           $result['banner_about']= '';

       }
       

       return view('admin/manage_home_banner',$result);
       
   }


   // insert data into db from add home_banner page
   //or update data in DataBase
   public function manage_home_banner_process(Request $request)
   {

       //validate the data 
       if($request->post('id')>0)
       {
            $vali = "mimes:jpeg,jpg,png";
       }
       else
       {
            $vali ="required|mimes:jpeg,jpg,png";
       }
       $request->validate([
           'image'=>$vali,
           'banner_name'=>'required',
       ]);


       //update data in db (update page)
       if($request->post('id')>0)
       {
           $model = Home_Banner::find($request->post('id'));
           $msg = "Banner Updated";
       }

       else
       {
           // else create new Model obj for insert new data into db (add new cartegory)
           $model = new Home_Banner();
           $msg = "Banner Inserted";

       }

       $model->btn_text = $request->post('btn_text');
       $model->btn_link = $request->post('btn_link');
       $model->off = $request->post('off');
       $model->banner_name = $request->post('banner_name');
       $model->banner_about = $request->post('banner_about');
       

       if($request->hasFile("image")){

            if($request->post('id')>0){
                $arrImage = DB::table('home__banner')
                ->where(['id'=>$request->post('id')])->get();

                if(Storage::exists('/public/media/banners/'.$arrImage[0]->image))
                {
                    Storage::delete('/public/media/banners/'.$arrImage[0]->image);
                }
            }


           $rand=rand('111111111','999999999');
           $image=$request->file("image");
           $ext=$image->extension();
           $image_name=$rand.'.'.$ext;
           $request->file("image")->storeAs('/public/media/banners',$image_name);

           $model->image=$image_name;
       }

       $model->status = 1;

       $model->save();
       

       //Session
       $request->session()->flash('message',$msg);
       return redirect('admin/home_banner');

   }

   //delete home_banner from list(table)
   public function delete_home_banner(Request $request, $id)
   {
       $model = Home_Banner::find($id);
       $model->delete();

       //Session
       $request->session()->flash('message','Banner Deleted');
       return redirect('admin/home_banner');
   }


   //change home_banner status
   public function status(Request $request, $status, $id)
   {
       $model = Home_Banner::find($id);
       $model->status=$status;
       $model->save();

       //Session
       $request->session()->flash('message','Status Updated');
       return redirect('admin/home_banner');
   }
}
