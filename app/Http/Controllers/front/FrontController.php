<?php

namespace app\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;


class FrontController extends Controller
{
    
    public function index(Request $request)
    {
        $result['home_categories']=DB::table('categories')
                ->where(['status'=>1])
                ->where(['is_home'=>1])
                ->get();


        foreach($result['home_categories'] as $list){
            $result['home_categories_product'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['category_id'=>$list->id])
                ->get();

            foreach($result['home_categories_product'][$list->id] as $list1){
                $result['home_product_attr'][$list1->id]=
                    DB::table('products_attr')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['products_attr.products_id'=>$list1->id])
                    ->get();
                
            }
        }

        $result['home_brand']=DB::table('brands')
                ->where(['status'=>1])
                ->where(['is_home'=>1])
                ->get();
        

        $result['home_featured_product'][$list->id]=
                DB::table('products')
                ->where(['status'=>1])
                ->where(['is_featured'=>1])
                ->get();

        foreach($result['home_featured_product'][$list->id] as $list1){
            $result['home_featured_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }

        $result['home_tranding_product'][$list->id]=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['is_tranding'=>1])
            ->get();

        foreach($result['home_tranding_product'][$list->id] as $list1){
            $result['home_tranding_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }

        $result['home_discounted_product'][$list->id]=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['is_discounted'=>1])
            ->get();

        foreach($result['home_discounted_product'][$list->id] as $list1){
            $result['home_discounted_product_attr'][$list1->id]=
                DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            
        }

        $result['home_banner']=DB::table('home__banners')
                ->where(['status'=>1])
                ->get();
        
        
        
        return view('front.index',$result);
    }

// -------------------------------------------- Product Page -------------------------------------------- 
    public function product(Request $request,$slug)
        {
            $result['product']=
            DB::table('products')->where(['slug'=>$slug])->get();

            foreach($result['product'] as $list1){
                $result['product_attr'][$list1->id]=
                    DB::table('products_attr')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['products_attr.products_id'=>$list1->id])
                    ->get();
            
            }
            
            foreach($result['product'] as $list1){
                $result['product_images'][$list1->id]=
                    DB::table('product_images')
                    ->where(['product_images.products_id'=>$list1->id])
                    ->get();
            
            }


            $result['related_product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where('slug','!=',$slug)
            ->where(['category_id'=>$result['product'][0]->category_id])
            ->get();

            foreach($result['related_product'] as $list1){
                $result['related_product_attr'][$list1->id]=
                    DB::table('products_attr')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->where(['products_attr.products_id'=>$list1->id])
                    ->get();
            }

            
            // echo "<pre>";
            // print_r($result);
            return view('front.product',$result);
        }


        // -------------------------------------------- add_to_cart button -------------------------------------------- 

        public function add_to_cart(Request $request)
        {
            if($request->session()->has('FRONT_USER_LOGIN')){
                $uid=$request->session()->get('FRONT_USER_ID');
                $user_type = "Reg"; 
            }else{

                $uid=getUserTempId();
                $user_type = "Non-Reg";
            }

            

            $size_id = $request->post('size_id');
            $color_id = $request->post('color_id');
            $product_id = $request->post('product_id');
            $pqty = $request->post('pqty');

            $result=DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['products_id'=>$product_id])
            ->where(['sizes.size'=>$size_id])
            ->where(['colors.color'=>$color_id])
            ->get();

            $product_attr_id = $result[0]->id;

            // cc($result);

            $check=DB::table('cart')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->where(['product_id'=>$product_id])
                ->where(['product_attr_id'=>$product_attr_id])
                ->get();

            if(isset($check[0]))
            {
                $update_id = $check[0]->id;
                if($pqty==0)
                {
                    DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->delete();
                    $msg = "Deleted";
                }
                else{
                    DB::table('cart')
                    ->where(['id'=>$update_id])
                    ->update(['qty'=>$pqty]);
                    $msg = "Updated";
                }
            }
            else{
                $id=DB::table('cart')->insertGetId([
                    'user_id'=>$uid,
                    'user_type'=>$user_type,
                    'product_id'=>$product_id,
                    'product_attr_id'=>$product_attr_id,
                    'qty'=>$pqty,
                    'added_on'=>date('Y-m-d h:i:s')
                ]);
                $msg = "Added";
            }
            $result =DB::table('cart')
            ->leftJoin('products','products.id','=','cart.product_id')
            ->leftJoin('products_attr','products_attr.id','=','cart.product_attr_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->where(['user_id'=>$uid])
            ->where(['user_type'=>$user_type])
            ->select("cart.qty","products.name","products.image","sizes.size","colors.color","products_attr.price","products.slug","products.id as pid","products_attr.id as attr_id")
            ->get();
            
            return response()->json(['msg'=>$msg,'data'=>$result,'totalItem'=>count($result)]);
        }


        // -------------------------------------------- cart Page -------------------------------------------- 
        public function cart(Request $request)
        {
            if($request->session()->has('FRONT_USER_LOGIN')){
                $uid=$request->session()->get('FRONT_USER_ID');
                $user_type = "Reg";
            }else{

                $uid=getUserTempId();
                $user_type = "Non-Reg";
            }

            $result =DB::table('cart')
                ->leftJoin('products','products.id','=','cart.product_id')
                ->leftJoin('products_attr','products_attr.id','=','cart.product_attr_id')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                ->where(['user_id'=>$uid])
                ->where(['user_type'=>$user_type])
                ->select("cart.qty","products.name","products.image","sizes.size","colors.color","products_attr.price","products.slug","products.id as pid","products_attr.id as attr_id")
                ->get();

            return view ("front.cart",["list"=>$result]);
        }


    // -------------------------------------------- Category Page -------------------------------------------- 
    public function category(Request $request,$slug)
    {
        // sorting category items (categoryfilter)
        $sort="";
        if($request->get('sort')!=null)
        {
            $sort = $request->get('sort');
        }
        
        $query=DB::table('products');
        $query=$query->leftJoin('categories','categories.id','=','products.category_id');
        $query=$query->leftJoin('products_attr','products_attr.products_id','=','products.id');
        
        $query=$query->where(['products.status'=>1]);
            
        $query=$query->where(['categories.category_slug' =>$slug]);
        if($sort == "default")
        {
            $query=$query->orderBy('products.id','desc');
        }
        if($sort == "name")
        {
            $query=$query->orderBy('products.name','asc');
        }
        if($sort == "date")
        {
            $query=$query->orderBy('products.id','desc');
        }
        if($sort=="price_desc")
        {
            $query=$query->orderBy('products_attr.price','desc');
        }

        if($sort=="price_asc")
        {
            $query=$query->orderBy('products_attr.price','asc');
        }

        $filter_price_start='';
        $filter_price_end='';
        $color_filter='';
        $colorFilterArr=[];

        if($request->get('color_filter')!=null)
        {
            $color_filter=$request->get('color_filter');

            $colorFilterArr=explode(":",$color_filter);
            $colorFilterArr = array_filter($colorFilterArr);

            $query=$query->where(['products_attr.color_id'=> $request->get('color_filter')]);
            
        }

        if($request->get('filter_price_start')!=null && $request->get('filter_price_end')!=null)
            {
                $filter_price_start = $request->get('filter_price_start');
                $filter_price_end = $request->get('filter_price_end');

                if($filter_price_start>0 && $filter_price_end>0)
                {
                    $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);
                }
            }

        $query=$query->distinct()->select("products.*");
        $query=$query->get();
        $result['sort'] = $sort;
        $result['product'] = $query;

        
        foreach($result['product'] as $list2){
            
            $query1=DB::table('products_attr');
            $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
            $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
            
            $query1=$query1->where(['products_attr.products_id'=>$list2->id]);

            $query1=$query1->get();

            $result['product_attr'][$list2->id]=$query1;
        }

        $result['colors']=DB::table('colors')
                ->where(['status'=>1])
                ->get();

        $result['categories_left']=DB::table('categories')
        ->where(['status'=>1])
        ->get();
        

        $result['slug'] = $slug;
        $result['filter_price_start'] = $filter_price_start;
        $result['filter_price_end'] = $filter_price_end;
        $result['color_filter'] = $color_filter;
        $result['colorFilterArr'] = $colorFilterArr;
            // cc($result['product']);

        return view('front.category',$result);
    }

// -------------------------------------------- Search Page -------------------------------------------- 
    public function search(Request $req , $str)
    {
        $result['product']=
            $query=DB::table('products');
            $query=$query->leftJoin('categories','categories.id','=','products.category_id');
            $query=$query->leftJoin('products_attr','products.id','=','products_attr.products_id');
            $query=$query->where(['products.status'=>1]);
            $query=$query->where('name','like',"%$str%");
            $query=$query->orwhere('model','like',"%$str%");
            $query=$query->orwhere('short_desc','like',"%$str%");
            $query=$query->orwhere('desc','like',"%$str%");
            $query=$query->orwhere('keywords','like',"%$str%");
            $query=$query->orwhere('technical_specification','like',"%$str%") ;
            $query=$query->distinct()->select('products.*');
            $query=$query->get();
            $result['product']=$query;
            
            foreach($result['product'] as $list1){
               
                $query1=DB::table('products_attr');
                $query1=$query1->leftJoin('sizes','sizes.id','=','products_attr.size_id');
                $query1=$query1->leftJoin('colors','colors.id','=','products_attr.color_id');
                $query1=$query1->where(['products_attr.products_id'=>$list1->id]);
                $query1=$query1->get();
                $result['product_attr'][$list1->id]=$query1;
            }

        return view('front.search',$result);
    }



    // ----------------------------- User Registration -----------------------------
    public function registration(Request $request)
    {
        if($request->session()->has('FRONT_USER_LOGIN')!=null)
        {
            return redirect('/');
        }
        return view('front.registration');
    }


    //User registration and email_verification
    public function registration_process(Request $request)
    {
        $valid = Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email|unique:customers,email',
            "password"=>'required',
            "mobile"=>'required|numeric|digits:10'
        ]);

        if($valid->fails()){ 
            return response()->json(['status'=>'error',
            'error'=>$valid->errors()->toArray()]);
        }
        else
        {
            $rand_id = rand(111111111,999999999);
            $arr=[
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "status"=>1,
                "is_verify"=>0,
                "rand_id"=>$rand_id,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];

            $query = DB::table('customers')->insert($arr);
            if($query)
            {
                //verify user via email
                $data = ['name'=>$request->name,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('front/email_verification',$data,function($message) use ($user){
                    $message->to($user['to']);
                    $message->subject('Email Verification');
                });

                return response()->json(['status'=>'success',
                'msg'=>"Registration Successfull, Please check your email for verify your account"]);
            }
        }
    }

    public function login_process(Request $request)
    {

        $result=DB::table('customers')
        ->where(['email'=>$request->str_login_email])
        ->get();

        if(isset($result[0])){

            //decrypt db password
            $db_pwd=Crypt::decrypt($result[0]->password);
            $status = $result[0]->status;
            $is_verify = $result[0]->is_verify;

            if($is_verify==0){
                return response()->json(['status'=>'error',
                'msg'=>'Please verify your email id']);
            }

            if($status==0){
                return response()->json(['status'=>'error',
                'msg'=>'You account has been deactivated']);
            }

            if($db_pwd==$request->str_login_password){

                if($request->rememberme==null){
                    setcookie('login_email',$request->str_login_email,100);
                    setcookie('login_pwd',$request->str_login_password,100);
                }
                else
                {
                    setcookie('login_email',$request->str_login_email,time()+60*60*24*365);
                    setcookie('login_pwd',$request->str_login_password,time()+60*60*24*365);
                }
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME ',$result[0]->name); 
                $status="success";
                $msg="";

                $getUserTempId=getUserTempId();  
                DB::table('cart')
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Non-Reg'])
                    ->update(['user_id'=>$result[0]->id,'user_type'=>'Reg']);

            }else{
                $status="error";
                $msg="Please enter valid details";
            }
            
        }else{
            $status="error";
            $msg="Please enter valid details";
        }

        return response()->json(['status'=>$status,
                'msg'=>$msg]);
    }


    //email_verification link
    public function email_verification(Request $request,$id)
    {
        $result=DB::table('customers')
        ->where(['rand_id'=>$id])
        ->get();
        
        if(isset($result[0]))
        {
            $result=DB::table('customers')
            ->where(['id'=>$result[0]->id])
            ->update(['is_verify'=>1,'rand_id'=>'']);

            return view('front.verified');
        }
        else
        {
            return redirect('/');
        }
    }


    public function forgot_password(Request $request)
    {
        $result = DB::table('customers')
        ->where(['email'=>$request->str_forgot_email])
        ->where(['is_verify'=>1])
        ->get();

        if(isset($result[0]))
        {

            $rand_id = rand(111111111,999999999);

            $result=DB::table('customers')
            ->where(['email'=>$request->str_forgot_email])
            ->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);

            
            $data = ['rand_id'=>$rand_id];
            $user['to']=$request->str_forgot_email;
            Mail::send('front/forgot_password',$data,function($message) use ($user){
                $message->to($user['to']);
                $message->subject('Forgot Password');
            });

            return response()->json(['status'=>'success',
            'msg'=>"Please Check your email"]);
        }
        else
        {
            return response()->json(['status'=>'error',
            'msg'=>'Email Id not registred']);
        }
    }


    // Enter yoour new password
    public function forgot_password_change(Request $request,$id)
    {
        $result=DB::table('customers')
        ->where(['rand_id'=>$id])
        ->where(['is_forgot_password'=>1])
        ->get();
        
        if(isset($result[0]))
        {
            $request->session()->put('FORGOT_PASSWORD_USER_ID',$result[0]->id);
            
            return view('front.forgot_password_change');
        }
        else
        {
            return redirect('/');
        }
    }

    public function forgot_password_change_process(Request $request)
    {
        
        $result=DB::table('customers')
            ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])
            ->update(
                [
                    'is_forgot_password'=>0,
                    'password'=>Crypt::encrypt($request->password),
                    'rand_id'=>''
                
            ]);

        return response()->json(['status'=>'success','msg'=>'password changed']);
    
        
    }


    //checkout
    public function checkout(Request $request)
    {

        $result['cart_data'] = getAddToCartTotalItem();
        if(isset($result['cart_data'][0]))
        {
            if($request->session()->has('FRONT_USER_LOGIN')){
                $uid=$request->session()->get('FRONT_USER_ID');
                $customer_info = DB::table('customers')
                    ->where(['id'=>$uid])
                    ->get();
                $result['customers']['name']=$customer_info[0]->name;
                $result['customers']['email']=$customer_info[0]->email;
                $result['customers']['mobile']=$customer_info[0]->mobile;
                $result['customers']['address']=$customer_info[0]->address;
                $result['customers']['city']=$customer_info[0]->city;
                $result['customers']['state']=$customer_info[0]->state;
                $result['customers']['zip']=$customer_info[0]->zip;
                $result['customers']['company']=$customer_info[0]->company;
                $result['customers']['gstin']=$customer_info[0]->gstin;
            }else{
                $result['customers']['name']='';
                $result['customers']['email']='';
                $result['customers']['mobile']='';
                $result['customers']['address']='';
                $result['customers']['city']='';
                $result['customers']['state']='';
                $result['customers']['zip']='';
                $result['customers']['company']='';
                $result['customers']['gstin']='';

            }
           
            return view('front.checkout',$result);
        }
        else
        {
            return redirect('/');
        }
      
    }

    //apply coupon code
    public function apply_coupon_code(Request $request)
    {
        $arr = apply_coupon_code($request->coupon_code);
        $arr = json_decode($arr,true);

        return response()->json(['status'=>$arr['status'],'msg'=>$arr['msg'],'totalprice'=>$arr['totalprice']]);
    }



    //remove coupon code
    public function remove_coupon_code(Request $request)
    {
        $result=DB::table('coupons')
        ->where(['code'=>$request->coupon_code])
        // ->where(['status'=>1])
        ->get();
        $totalprice=0;

        $getAddToCartTotalItem=getAddToCartTotalItem();
        foreach($getAddToCartTotalItem as $list)
        {
            $totalprice = $totalprice + ($list->price * $list->qty); 
        }
        return response()->json(['status'=>"success",'msg'=>"Coupon code removed",'totalprice'=>$totalprice]);
        
    }


    //Place order
    public function place_order(Request $request)
    {
        $payment_url = '';
        if($request->session()->has('FRONT_USER_LOGIN')){

        }
        else
        {
            $valid = Validator::make($request->all(),[
            "email"=>'required|email|unique:customers,email'
            ]);

            if($valid->fails()){ 
                return response()->json(['status'=>'error',
                'msg'=>"The email has already been taken."]);
                
            }
            else
            {
                $rand_id=rand(111,999999999);
                $arr=[
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>Crypt::encrypt($rand_id),
                    "mobile"=>$request->mobile,
                    "status"=>1,
                    "is_verify"=>1,
                    "rand_id"=>$rand_id,
                    "created_at"=>date('Y-m-d h:i:s'),
                    "updated_at"=>date('Y-m-d h:i:s')
                ];

                $user_id = DB::table('customers')->insertGetId($arr);
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$user_id);
                $request->session()->put('FRONT_USER_NAME ',$request->name); 


                $getUserTempId=getUserTempId();  
                DB::table('cart')
                    ->where(['user_id'=>$getUserTempId,'user_type'=>'Non-Reg'])
                    ->update(['user_id'=>$user_id,'user_type'=>'Reg']);
            }
        }
            $coupon_value=0;
            if($request->coupon_code!='')
            {
                $arr = apply_coupon_code($request->coupon_code);
                $arr = json_decode($arr,true);
                if($arr['status']=='success')
                {
                    $coupon_value=$arr['coupon_code_value'];
                }
                else
                {
                    return response()->json(['status'=>'failed','msg'=>$arr['msg']]);
                }
            }
            
            $uid=$request->session()->get('FRONT_USER_ID');
            $totalprice = 0;
            $getAddToCartTotalItem=getAddToCartTotalItem();

            foreach($getAddToCartTotalItem as $list)
            {
                $totalprice = $totalprice + ($list->price * $list->qty);
            }
            $arr=[
                "customers_id" => $uid,
                "name" => $request->name,
                "email" => $request->email,
                "mobile" => $request->mobile,
                "address" => $request->address,
                "city" => $request->city,
                "state" => $request->address,
                "pincode" => $request->zip,
                "coupon_code" => $request->coupon_code,
                "coupon_value" => $coupon_value,
                "order_status" => 1,
                "payment_type" => $request->payment_type,
                "payment_status" => "pending",
                "total_amt" => $totalprice,
                "added_on" =>date('Y-m-d h:i:s')
            ];
            $order_id = DB::table('orders')->insertGetId($arr);
            

            if($order_id>0){

                foreach($getAddToCartTotalItem as $list)
                {
                    $productDetailArr['product_id'] = $list->pid;
                    $productDetailArr['product_attr_id'] = $list->attr_id;
                    $productDetailArr['price'] = $list->price;
                    $productDetailArr['qty'] = $list->qty;
                    $productDetailArr['orders_id'] = $order_id;

                    DB::table('orders_details')->insertGetId($productDetailArr);
                }

                //gateway
                if($request->payment_type=="Gateway")
                {
                    $final_amt = $totalprice - $coupon_value;
                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                    curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_7dea673f794591947c0e71ffe98","X-Auth-Token:test_e79c48e4513f8e559f5f2e94fd7"));
                    $payload = Array(
                        'purpose' => 'Buy Product',
                        'amount' => $final_amt,
                        'phone' => $request->mobile,
                        'buyer_name' => $request->name,
                        'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                        'send_email' => true,
                        'send_sms' => true,
                        'email' => $request->email,
                        'allow_repeated_payments' => false
                    );
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                    $response = curl_exec($ch);
                    curl_close($ch);
                    $response=json_decode($response);
                    // cc($response);
                    //get txn_id

                    if(isset($response->payment_request->id))
                    {
                        $txn_id = $response->payment_request->id;

                        //update the table
                        DB::table('orders')
                        ->where(['id'=> $order_id])
                        ->update(['txn_id'=>$txn_id]);
                        // cc($response);
                    $payment_url=$response->payment_request->longurl;
                    }
                    else
                    {
                        $msg = "";
                        foreach($response->message as $key=>$val)
                        {
                            $msg.= strtoupper($key).": ".$val[0]."<br>";
                        }
                        return response()->json(['status'=>"error",'msg'=>$msg,'payment_url'=>'']);

                    }
                    
                    
                    // cc($response->payment_request);
                }

                DB::table('cart')
                ->where(['user_id'=>$uid,'user_type'=>"Reg"])->delete();

                $request->session()->put('ORDER_ID',$order_id);
                $status="success";
                $msg = "Order placed";
            }
            else
            {
                $status="failed";
                $msg = "Please try after sometime";
            }
            
        
        return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]);
    }



    public function order_placed(Request $request)
    {
        if($request->session()->has('ORDER_ID'))
        {
            return view('front.order_placed');
        }
        else
        {
            return redirect('/');
        }
    }

    public function order_failed(Request $request)
    {
        if($request->session()->has('ORDER_STATUS'))
        {
            return view('front.order_failed');
        }
        else
        {
            return redirect('/');
        }
    }


    //payment gateway redirect
    public function instamojo_payment_redirect(Request $request)
    {
        if($request->get('payment_id')!='' && $request->get('payment_status')!='' && $request->get('payment_request_id')!='')
        {
            if($request->get('payment_status')=="Credit")
            {
                $status = "Success";
                $redirect_url = '/order_placed';
            }
            else
            {
                $status = "failed";
                $redirect_url = '/order_failed';

            }
            $request->session()->put('ORDER_STATUS',$status);
            DB::table('orders')
                ->where(['txn_id'=>$request->get('payment_request_id')])
                ->update(['payment_id'=> $request->get('payment_id'),'payment_status'=>$status]);
          
                return redirect($redirect_url);
           
        }
        else
        {
            die("Something went wrong");
        }
    }
}
