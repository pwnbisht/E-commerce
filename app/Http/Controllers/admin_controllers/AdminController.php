<?php

namespace App\Http\Controllers\admin_controllers;

use App\Http\Controllers\Controller;
use App\Models\admin_models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('admin/dashboard');
        }
        else
        {
            return view('admin.adminlogin');

        }
        
    }




    //for signIN auth
    public function auth(Request $req)
    {
        $email = $req->post('email');
        $password = $req->post('password');

         //$res = Admin::where(['email'=>$email,'password'=>$password])->get();
        //  echo $res;



        //check whether email is valid or not
        $res = Admin::where(['email'=>$email])->first();
        if($res)
        {

            // check whether password is correct or not
            if(Hash::check($password,$res->password))
            {

            }
            else{
                $req->session()->flash('error','Please enter correct password');
                return redirect('admin');
            }

            $req->session()->put('ADMIN_LOGIN',true);
            $req->session()->put('ADMIN_ID',$res->id);
            return redirect('admin/dashboard');
        }
        else{
            $req->session()->flash('error','Please enter valid login details');
            return redirect('admin');
        }


        // if(isset($res['0']->id))
        // {
        //     $req->session()->put('ADMIN_LOGIN',true);
        //     $req->session()->put('ADMIN_ID',$res['0']->id);
        //     return redirect('admin/dashboard');

        // }
        // else
        // {
        //     $req->session()->flash('error','Please enter valid login details');
        //     return redirect('admin');
        // }
    }

   
   
    // after clicking signin button Dashboard
        public function dashboard()
        {
            return view('admin.dashboard');
        }

        
    
}
