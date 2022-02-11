<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;

use App\Models\admin_models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    //return tax list page
    public function index()
    {
        $result = Tax::all();
        return view('admin.tax', ['data' => $result]);
    }



    //return add tax page 
    //or update tax
    public function manage_tax($id = '')
    {
        if ($id > 0) {
            $arr = Tax::where(['id' => $id])->get();

            $result['id'] = $arr['0']->id;
            $result['tax_desc'] = $arr['0']->tax_desc;
            $result['tax_value'] = $arr['0']->tax_value;
            $result['status'] = $arr['0']->status;
        } else {
            $result['tax_desc'] = '';
            $result['tax_value'] = '';
            $result['status'] = "";
            $result['id'] = 0;
        }

        return view('admin/manage_tax', $result);
    }




    // insert data into db from add tax page
    //or update data in DataBase
    public function manage_tax_process(Request $request)
    {

        //validate the data 
        $request->validate([
            'tax_value' => 'required|unique:taxes,tax_value,'. $request->post('id'),
            
            // 'code' => 'required|unique:coupons,code,' . $request->post('id'),
        ]);


        //update data in db (update page)
        if ($request->post('id') > 0) {
            $model = Tax::find($request->post('id'));
            $msg = "Tax Updated";
        } else {
            // else create new Model obj for insert new data into db (add new cartegory)
            $model = new Tax();
            $msg = "Tax Inserted";
        }

        $model->tax_desc = $request->post('tax_desc');
        $model->tax_value = $request->post('tax_value');
        $model->status = 1;     //giving the default value
        $model->save();


        //Session
        $request->session()->flash('message', $msg);
        return redirect('admin/tax');
    }



    //delete tax from list(table)
    public function delete_tax(Request $request, $id)
    {
        $model = Tax::find($id);
        $model->delete();

        //Session
        $request->session()->flash('message', 'Tax Removed');
        return redirect('admin/tax');
    }


    //change tax status
    public function status(Request $request, $status, $id)
    {
        $model = Tax::find($id);
        $model->status = $status;
        $model->save();

        //Session
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/tax');
    }
}
