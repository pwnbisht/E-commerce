<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Customer::all();
        return view('admin/customer',['data'=>$result]);
    }

    public function show($id='')
    {
        
        $arr = Customer::where(['id'=>$id])->get();

        $result['customer_list']= $arr['0'];

        return view('admin/show_customer',$result);
                    
        
        
    }

    public function status(Request $request, $status, $id)
    {
        $model = Customer::find($id);
        $model->status=$status;
        $model->save();

        //Session
        $request->session()->flash('message','Status Updated');
        return redirect('admin/customer');
    }
    
}
