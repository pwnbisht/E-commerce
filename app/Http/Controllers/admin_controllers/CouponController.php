<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //return coupon table page
    public function index()
    {
        $result = Coupon::all();
        return view('admin.coupon',['data'=>$result]);
    }



    //return add coupon page 
    //or update coupon
    public function manage_coupon($id='')
    {
        if($id>0){
            $arr = Coupon::where(['id'=>$id])->get();

            $result['id']= $arr['0']->id;
            $result['title']= $arr['0']->title;
            $result['code']= $arr['0']->code;
            $result['value']= $arr['0']->value;
            $result['type']= $arr['0']->type;
            $result['min_order_amt']= $arr['0']->min_order_amt;
            $result['is_one_time']= $arr['0']->is_one_time;
                      
        }
        else
        {
            $result['title']="";
            $result['code']="";
            $result['value']="";
            $result['type']= '';
            $result['min_order_amt']= '';
            $result['is_one_time']= '';
            $result['id']= "0";

        }
        
        return view('admin/manage_coupon',$result);
        
    }




    // insert data into db from add coupon page
    //or update data in DataBase
    public function manage_coupon_process(Request $request)
    {

        //validate the data 
        $request->validate([
            'title'=>'required',
            'value'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id'),
        ]);


        //update data in db (update page)
        if($request->post('id')>0)
        {
            $model = Coupon::find($request->post('id'));
            $msg = "Coupon Updated";
        }

        else
        {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Coupon();
            $msg = "Coupon Inserted";
            $model->status = 1;
        }

        $model->title = $request->post('title');
        $model->code = $request->post('code');
        $model->value = $request->post('value');
        $model->type = $request->post('type');
        $model->min_order_amt = $request->post('min_order_amt');
        $model->is_one_time = $request->post('is_one_time');

        $model->save();
        

        //Session
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');

    }



    //delete coupon from list(table)
    public function delete_coupon(Request $request, $id)
    {
        $model = Coupon::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/coupon');
    }


    //change coupon status
    public function status(Request $request, $status, $id)
    {
        $model = Coupon::find($id);
        $model->status=$status;
        $model->save();

        //Session
        $request->session()->flash('message','Status Updated');
        return redirect('admin/coupon');
    }
}
