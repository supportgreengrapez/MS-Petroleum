<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Mail;
use PDF;
use Illuminate\Http\Request;
use Response;
use SoapClient;
use App\Cart;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\UsersExport;
class adminController extends Controller
{
    public  function admin_login_view() {

     
     
     
        if ((session()
            ->has('type') && session()
            ->get('type') == 'admin'))
        {
             return Redirect::back();
        }
        else
       
     
     
     
        {
         
            return view('admin.login');
        }

    }
    public function logout()
{
    session()->flush();
    return redirect('/admin');
}
    public function index(Request $request)
    {

        $this->validate($request,['username' => 'required','password'=> 'required']);
        $password= md5($request->input('password'));
         $username= $request->input('username');
         // dd($password,$username);     
         $result = DB::select("select* from admin_details where username = '$username' and password='$password'");

// dd($result);
        if(count($result)>0){
            $request->session()->put('pk_id',$result[0]->pk_id);
            $request->session()->put('username',$username);
            $request->session()->put('name',$result[0]->{'fname'}.' '.$result[0]->{'lname'});


            $request->session()
                ->put('Machine_Management', $result[0]->{'Machine_Management'});
                $request->session()
                ->put('Machine_Management_edit', $result[0]->{'Machine_Management_edit'});
                $request->session()
                ->put('Machine_Management_delete', $result[0]->{'Machine_Management_delete'});

            $request->session()
                ->put('Admin_Management', $result[0]->{'Admin_Management'});
           
                $request->session()
                ->put('Expense_Management', $result[0]->{'Expense_Management'});
                $request->session()
                ->put('Expense_Management_edit', $result[0]->{'Expense_Management_edit'});
                $request->session()
                ->put('Expense_Management_delete', $result[0]->{'Expense_Management_delete'});

            $request->session()
                ->put('Customer_Management', $result[0]->{'Customer_Management'});
                $request->session()
                ->put('Customer_Management_edit', $result[0]->{'Customer_Management_edit'});
                $request->session()
                ->put('Customer_Management_delete', $result[0]->{'Customer_Management_delete'});

            $request->session()
                ->put('Sales_Management', $result[0]->{'Sales_Management'});
                $request->session()
                ->put('Sales_Management_edit', $result[0]->{'Sales_Management_edit'});
                $request->session()
                ->put('Sales_Management_delete', $result[0]->{'Sales_Management_delete'});
            
                $request->session()
                ->put('Supplier_Management', $result[0]->{'Supplier_Management'});
                $request->session()
                ->put('Supplier_Management_edit', $result[0]->{'Supplier_Management_edit'});
                $request->session()
                ->put('Supplier_Management_delete', $result[0]->{'Supplier_Management_delete'});

            $request->session()
                ->put('Purchase_Management', $result[0]->{'Purchase_Management'});
                $request->session()
                ->put('Purchase_Management_edit', $result[0]->{'Purchase_Management_edit'});
                $request->session()
                ->put('Purchase_Management_delete', $result[0]->{'Purchase_Management_delete'});

            $request->session()
                ->put('Category_Management', $result[0]->{'Category_Management'});
                $request->session()
                ->put('Category_Management_edit', $result[0]->{'Category_Management_edit'});
                $request->session()
                ->put('Category_Management_delete', $result[0]->{'Category_Management_delete'});

            $request->session()
                ->put('Report', $result[0]->{'Report'});
                $request->session()
                ->put('Report_edit', $result[0]->{'Report_edit'});
                $request->session()
                ->put('Report_delete', $result[0]->{'Report_delete'});

                $request->session()
                ->put('Item_Management', $result[0]->{'Item_Management'});
                $request->session()
                ->put('Item_Management_edit', $result[0]->{'Item_Management_edit'});
                $request->session()
                ->put('Item_Management_delete', $result[0]->{'Item_Management_delete'});

                $request->session()
                ->put('Kachi_Parchi', $result[0]->{'Kachi_Parchi'});
                $request->session()
                ->put('Kachi_Parchi_edit', $result[0]->{'Kachi_Parchi_edit'});
                $request->session()
                ->put('Kachi_Parchi_delete', $result[0]->{'Kachi_Parchi_delete'});

                $request->session()
                ->put('Pump_Management', $result[0]->{'Pump_Management'});
                $request->session()
                ->put('Pump_Management_edit', $result[0]->{'Pump_Management_edit'});
                $request->session()
                ->put('Pump_Management_delete', $result[0]->{'Pump_Management_delete'});

                $request->session()
                ->put('Accounts_Management', $result[0]->{'Accounts_Management'});
                $request->session()
                ->put('Accounts_Management_edit', $result[0]->{'Accounts_Management_edit'});
                $request->session()
                ->put('Accounts_Management_delete', $result[0]->{'Accounts_Management_delete'});


            $request->session()->put('type','admin');
          
            return view('admin.home',compact('result'));
       
        }
        else
        {
            return Redirect::back()->withErrors('Username or Password is incorrect');
        }
    }

    public  function customer_list_view() {

       
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }

            $result = DB::select("select* from customer");

            return view('admin.customer_list_view',compact('result'));
        }

  
    public  function add_customer_view() {

        
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }

            return view('admin.add_customer_view');
        }

        public function add_customer(Request $request) {

            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
                // dd($request->input('customer_name'),date('Y:m:y H:i:s'),$request->input('current_balance'));
                  DB::insert("insert into customer(customer_name,cnic,phone,billing_address,ntn,strn,opening_balance,current_balance) values (?,?,?,?,?,?,?,?)",array($request->input('customer_name'),$request->input('cnic'),$request->input('phone'),$request->input('billing_address'),$request->input('ntn'),$request->input('strn'),$request->input('opening_balance'),$request->input('current_balance')));
                  $last_id = DB::getPdo()->lastInsertId();
                  if($request->input('current_balance') < 0)
                 {   
                // $amount_receivable = array();
                //     $amount_receivable['customer_name'] = $last_id;
                //      $amount_receivable['date'] = date('Y:m:y H:i:s');
                //     $amount_receivable['receiving_account'] = $request->input('current_balance');
                //     // dd($amount_receivable);
                //     $data = DB::table('account_receivable')->insert($amount_receivable);
                //     // dd($data);

                //      // DB::insert("insert into account_receivable (customer_name,date,receiving_account) values (?,?,?)",array($request->input('customer_name'),date('Y:m:y H:i:s'),$request->input('current_balance')));           
                  

                //   $result = DB::select("select* from account_receivable"); 


            
                  $total_amount = $request->input('opening_balance');


                    $account = DB::select("select* from account where account_type = 'Liabilities'");
                    $c_balance = $account[0]->balance - $total_amount;
                    $inc_balance = $account[0]->increase - $total_amount; 
                        DB::table('account')->where('account_type',"Liabilities")->update(['balance' =>$c_balance]);
                        DB::table('account')->where('account_type',"Liabilities")->update(['increase' =>$inc_balance]);
                  
                        
                    
                        

                      }else{
                        
            
                  $total_amount = $request->input('opening_balance');


                    $account = DB::select("select* from account where account_type = 'Cash On Hand'");
                         $c_balance = $account[0]->balance + $total_amount; 
                         $inc_balance = $account[0]->increase + $total_amount;
                        DB::table('account')->where('account_type',"Cash On Hand")->update(['balance' =>$c_balance]);
                        DB::table('account')->where('account_type',"Cash On Hand")->update(['increase' =>$inc_balance]);
                    


                        $account = DB::select("select* from account where account_type = 'Capital'");
                        $c_balance = $account[0]->balance + $total_amount; 
                        $inc_balance = $account[0]->increase + $total_amount;
                       DB::table('account')->where('account_type',"Capital")->update(['balance' =>$c_balance]);
                       DB::table('account')->where('account_type',"Capital")->update(['increase' =>$inc_balance]);
                   


                      }

              
                      return Redirect::back();
                    }


              
                  //       if(count($account)<0)
                  //   {
                  //       $c_balance = $account[0]->balance - $total_amount; 
                  //       DB::table('account')->where('account_type',"Account Receivable")->update(['balance' =>$c_balance]);
              
                  //   }
                  // else{

                  //     DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
                 
                  //     }

          

       public  function customer_detail_view($id) {

        
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                        return redirect('/admin');
                    }
                    $result = DB::select("select* from customer where pk_id='$id'");

                    return view('admin.customer_detail_view',compact('result'));
       }
       public  function delete_customer($id) {

        
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        DB::delete("delete from customer where pk_id='$id'");

        return redirect()->back();
}
public  function edit_customer_view($id) {

        
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    $result = DB::select("select* from customer where pk_id='$id'");

    return view('admin.edit_customer_view',compact('result'));
}

public function edit_customer(Request $request,$id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }
    DB::table('customer')->where('pk_id', $id)->update(['customer_name' =>$request->input('customer_name'),'cnic' => $request->input('cnic'),'phone' => $request->input('phone'),'billing_address' => $request->input('billing_address'),'ntn' => $request->input('ntn'),'strn' => $request->input('strn'),'opening_balance' => $request->input('opening_balance'),'current_balance' => $request->input('current_balance')]);


          return redirect('/admin/home/customer/list/view');
         }

         public function search_customer(Request $request) {
    
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }

     
           // dd($request->all(  ));
          $id_from =  $request->input('id_from');
          $id_to =  $request->input('id_to');

          $date_from =  $request->input('date_from');
          $date_to =  $request->input('date_to');

          $opening_balance_from =  $request->input('opening_balance_from');
          $opening_balance_to =  $request->input('opening_balance_to');

          $current_balance_from =  $request->input('current_balance_from');
          $current_balance_to =  $request->input('current_balance_to');


        //   $result = DB::select("select* from supplier where pk_id BETWEEN '$id_from' AND '$id_to' and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ");
        //   return $result;


            $result = "Select* from customer where ";
            $check = 0;
          if($request->input('id_from'))
          {
                        $result .= "pk_id BETWEEN '$id_from' AND '$id_to' ";
                        $check = 1;
          }
          // dd($result);

          if($request->input('date_from'))
          {
            if($check==1)
            {
                        $result .= "and date BETWEEN '$date_from' AND '$date_to' ";
            }
            else{
                $result .= "date BETWEEN '$date_from' AND '$date_to' ";
                $check = 1;
            }
            }
            if($request->input('opening_balance_from'))
            {
                if($check==1)
            {
                          $result .= "and opening_balance BETWEEN '$opening_balance_from' AND '$opening_balance_to' ";
            }
            else{
                $result .= "opening_balance BETWEEN '$opening_balance_from' AND '$opening_balance_to' ";
                $check = 1;
            }

        }
            if($request->input('current_balance_from'))
            {
                if($check==1)
                {
                          $result .= "and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
            }
            else{
                $result .= "current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
                $check = 1;
            }
        }
        // dd($result);

          $result = DB::select("$result");
       // dd($result);
            return view('admin.customer_list_view',compact('result'));
         
                 }



                 public function search_account(Request $request) {
    
                  if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                      return redirect('/admin');
                  }
      
           
                
      
                $date_from =  $request->input('date_from');
                $date_to =  $request->input('date_to');
      
              
      
      
              //   $result = DB::select("select* from supplier where pk_id BETWEEN '$id_from' AND '$id_to' and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ");
              //   return $result;
      
      
                  $result = "Select* from account where ";
                  $check = 0;
               
                if($request->input('date_from'))
                {
                  if($check==1)
                  {
                              $result .= "and date BETWEEN '$date_from' AND '$date_to' ";
                  }
                  else{
                      $result .= "date BETWEEN '$date_from' AND '$date_to' ";
                      $check = 1;
                  }
                  }
                 
            
              // dd($result);
      
                $result = DB::select("$result");
             // dd($result);
                  return view('admin.view_account_list',compact('result'));
               
                       }



///////////////////////////////////////////////////////////////////

         public  function supplier_list_view() {

            {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
    
                $result = DB::select("select* from supplier");
    
                return view('admin.supplier_list_view',compact('result'));
            }
    
        }
        public  function add_supplier_view() {
    
            
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
    
                return view('admin.add_supplier_view');
            }
    
            public function add_supplier(Request $request) {
    
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
        
                      DB::insert("insert into supplier(supplier_name,cnic,phone,billing_address,ntn,strn,opening_balance,current_balance) values (?,?,?,?,?,?,?,?)",array($request->input('supplier_name'),$request->input('cnic'),$request->input('phone'),$request->input('billing_address'),$request->input('ntn'),$request->input('strn'),$request->input('opening_balance'),$request->input('current_balance')));
                        $last_id = DB::getPdo()->lastInsertId();

                        $dataa = array();
                        $dataa['supplier_name'] = $last_id;
                        $dataa['date'] = date('Y:m:d H:i:s');
                        $dataa['amount_payed'] = $request->input('current_balance');
                        DB::table('account_payable')->insert($dataa);


                    //     DB::insert("insert into account_payable (supplier_name,date,amount_payed,paying_method,paying_account) values (?,?,?,?,?)",array($request->input('supplier_name'),$request->input('date'),$request->input('amount_payed'),$request->input('paying_method'),$request->input('paying_account')));           
                    // $result = DB::select("select* from account_payable"); 



                      $result = DB::select("select* from account_payable"); 


            
                      $total_amount = $request->input('current_balance');


                    $account = DB::select("select* from account where account_type = 'Account Payable'");

                    if(count($account)>0)
                    {
                        $c_balance = $account[0]->balance + $total_amount; 
                        DB::table('account')->where('account_type',"Account Payable")->update(['balance' =>$c_balance]);
              
                    }
                  else{

                      DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
                 
                      }
                        if(count($account)<0)
                    {
                        $c_balance = $account[0]->balance + $total_amount; 
                        DB::table('account')->where('account_type',"Account Payable")->update(['balance' =>$c_balance]);
              
                    }
                  else{

                      DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
                 
                      }

                      return Redirect::back();
                     }
    
           public  function supplier_detail_view($id) {
    
            
                        if(!(session()->has('type') && session()->get('type')=='admin'))
                        {
                            return redirect('/admin');
                        }
                        $result = DB::select("select* from supplier where pk_id='$id'");
    
                        return view('admin.supplier_detail_view',compact('result'));
           }
           public  function delete_supplier($id) {
    
            
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
            DB::delete("delete from supplier where pk_id='$id'");
    
            return redirect()->back();
    }
    public  function edit_supplier_view($id) {
    
            
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $result = DB::select("select* from supplier where pk_id='$id'");
    
        return view('admin.edit_supplier_view',compact('result'));
    }
    
    public function edit_supplier(Request $request,$id) {
    
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        DB::table('supplier')->where('pk_id', $id)->update(['supplier_name' =>$request->input('supplier_name'),'cnic' => $request->input('cnic'),'phone' => $request->input('phone'),'billing_address' => $request->input('billing_address'),'ntn' => $request->input('ntn'),'strn' => $request->input('strn'),'opening_balance' => $request->input('opening_balance'),'current_balance' => $request->input('current_balance')]);
    
    
              return redirect('/admin/home/supplier/list/view');
             }

             public function search_supplier(Request $request) {
    
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
               
              $id_from =  $request->input('id_from');
              $id_to =  $request->input('id_to');

              $date_from =  $request->input('date_from');
              $date_to =  $request->input('date_to');

              $opening_balance_from =  $request->input('opening_balance_from');
              $opening_balance_to =  $request->input('opening_balance_to');

              $current_balance_from =  $request->input('current_balance_from');
              $current_balance_to =  $request->input('current_balance_to');


            //   $result = DB::select("select* from supplier where pk_id BETWEEN '$id_from' AND '$id_to' and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ");
            //   return $result;


                $result = "Select* from supplier where ";
        
                $check = 0;
          if($request->input('id_from'))
          {
                        $result .= "pk_id BETWEEN '$id_from' AND '$id_to' ";
                        $check = 1;
          }
          // dd($result);
          if($request->input('date_from'))
          {
            if($check==1)
            {
                        $result .= "and date BETWEEN '$date_from' AND '$date_to' ";
            }
            else{
                $result .= "date BETWEEN '$date_from' AND '$date_to' ";
                $check = 1;
            }
            }
            if($request->input('opening_balance_from'))
            {
                if($check==1)
            {
                          $result .= "and opening_balance BETWEEN '$opening_balance_from' AND '$opening_balance_to' ";
            }
            else{
                $result .= "opening_balance BETWEEN '$opening_balance_from' AND '$opening_balance_to' ";
                $check = 1;
            }

        }
        
         if($request->input('current_balance_from'))
          {
                        $result .= "current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
                        $check = 1;
          }
        
        //     if($request->input('current_balance_from'))
        //     {
        //         if($check==1)
        //         {
        //                   $result .= "and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
        //     }
        //     else{
        //         $result .= "current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
        //         $check = 1;
        //     }
        // }
          // dd($result);
              $result = DB::select("$result");
                return view('admin.supplier_list_view',compact('result'));
             
                     }

/////////////////////////////////////////////////////

             public function main_category_list_view() {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }

                $result = DB::select("select* from main_category");

                return view('admin.view_main_category_list',compact('result'));

}

public function add_main_category_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
  
      return view('admin.add_main_category_view');
  
     }

     public function add_main_category(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
       {
           return redirect('/admin');
       }
   
   
          $cat = $request->input('mainCategory');
          // if(($request->input('mainCategory'))>0)
// {
          $item_id =  substr($cat,0,2);
         $count = DB::select("select* from main_category order by SKU desc");
         $count = $count[0]->SKU;
         $count = $count+1;
         $item_id = $item_id.$count;
        //  return  $item_id;
          $result = DB::select( DB::raw("SELECT * FROM main_category WHERE main_category = :value"), array(
      'value' => $cat,
    ));
           if(count($result)>0)
           {
                return Redirect::back()->withErrors('Category already Exist');
   
           }
           else
   
     {
   
             DB::insert("insert into main_category (item_id,main_category) values (?,?)",array($item_id,$request->input('mainCategory')));
             
            }
            return redirect('/admin/home/add/inventory');
          // }


      }
      public function edit_main_category_view($sku) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
      
          $result = DB::select("select* from main_category where SKU = '$sku'");
      
          return view('admin.edit_main_category',compact('result'));
      
      }

      public function edit_main_category(Request $request, $sku) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
      
                $cat = $request->input('mainCategory');
                $item_id =  substr($cat,0,2);

                $count = DB::select("select* from main_category where SKU = '$sku' ");
                $count = $count[0]->SKU;
                $item_id = $item_id.$count;
                // dd($item_id);
              $result = DB::select("select* from main_category where main_category = '$cat' ");
              if(count($result)>0)
              {
                   return Redirect::back()->withErrors('Category already Exist');
      
              }
              else
      
        {
      
      
          $main_category =$request->input('mainCategory');
      
          DB::table('main_category')->where('SKU', $sku)->update(['item_id' =>$item_id,'main_category' =>$main_category]);
          return redirect('/admin/home/view/main/category');
      
      }
      }

      public function delete_main_category($id) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
    
        DB::delete("delete from main_category where SKU = '$id'");
    
    
        return redirect()->back();
       }

////////////////////////////////////

public function add_product_type_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

   $result = DB::select("select* from main_category");
       $result1 = DB::select("select* from sub_category");
       return view('admin.add_product_type_view',compact('result','result1'));
      }

      public function add_product_type(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }




// ============================ type ================================//

       $category = $request->input('mainCategory');
       $a =  $request->input('sub_item');
       $name = $request->input('name');
       // if(( $request->input('name'))>0)
       // {
       $inventory = DB::select("select * from product_type where main_category='$category' and sub_category = '$a' and product_type = '$name'");
       if(count($inventory)>0)
       {
           return Redirect::back()->withErrors('Item Name already Exist');
       }
       else{
       $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
       'value' => $a,
       ));
       
       
       if(count($sub_category)>0)
       {
        $a = $sub_category[0]->sub_category;
       
       }
       else
       {
       
       $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
       'value' => $a,
       ));
       
       if(count($sub_category)>0)
       
       {
       $a = $sub_category[0]->sub_category;
       }
       else{
       $a = "";
       }
       }
       $inventory = DB::select("select* from product_type where main_category ='$category' and sub_category = '$a' order by pk_id desc");
       if(count($inventory)>0)
       {
           $sub_category = DB::select("select* from sub_category where main_category = '$category' and sub_category='$a'");
           if(count($sub_category)>0)
           {
               $sub_item_id = $sub_category[0]->sub_item_id;
           }
           $sku = $inventory[0]->sku;
           $sku = substr($sku, strpos($sku, "-") + 1);
           $sku = substr($sku, strpos($sku, "-") + 1);
       $sku = substr($sku,2);
       $sku = $sku+1;
       $inventory_id = substr($name,0,2);
       $sku = $sub_item_id."-".$inventory_id.$sku;
       }
       else{
           $sub_category = DB::select("select* from sub_category where main_category = '$category' and sub_category='$a'");
          // return $sub_category;
           if(count($sub_category)>0)
           {
               $sub_item_id = $sub_category[0]->sub_item_id;
           }
           $inventory_id = substr($name,0,2);
           $sku = $sub_item_id."-".$inventory_id."1";
       }
       
                    DB::insert("insert into product_type (sku,main_category,sub_category,product_type,description) values (?,?,?,?,?)",array($sku,$category,$a,$request->input('name'),$request->input('description')));
                   //  return redirect('/admin/home/view/product/type');
       }
     // }
     return redirect('/admin/home/view/product/type');

 
      }

      public function edit_product_type_view($pk_id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
      
      
          $result = DB::select("select* from product_type where pk_id = '$pk_id'");
      
          return view('admin.edit_inventory',compact('result'));
      
      }
      
      public function edit_product_type(Request $request, $pk_id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
      
         $cat = $request->input('productType');
            $cat1 = urldecode($request->input('mainCategory'));
      
             $cat2 = $request->input('subCategory');
      
      
               $result = DB::select( DB::raw("SELECT * FROM product_type WHERE product_type = :value and main_category= :value2 and sub_category= :value3 "), array(
         'value' => $cat,
         'value2' => $cat1,
         'value3' => $cat2,
       ));
              if(count($result)>0)
              {
                   return Redirect::back()->withErrors('Product Type already Exist');
      
              }
              else
      
        {
      
          DB::table('product_type')->where('pk_id', $pk_id)->update(['product_type' =>$cat,'main_category' =>$cat1,'sub_category' =>$cat2]);
          return redirect('/admin/home/view/product/type');
      
      }
      }
      public function product_type_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }

       $result = DB::select("select* from product_type");

       return view('admin.product_type_list_view',compact('result'));

}      


////////////////////////////////////
       public function add_sub_category_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
 {
     return redirect('/admin');
 }

         $result = DB::select("select* from main_category");
         return view('admin.add_sub_category_view',compact('result'));
        }

        public function add_sub_category(Request $request) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
   {
       return redirect('/admin');
   }
   $category = $request->input('mainCategory');

              $cat = $request->input('subCategory');

          $result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
  'value' => $cat,
  'value2' => $category,
));

  //     $result = DB::select("select* from sub_category where sub_category = '$cat' and main_category='$category'  ");
       if(count($result)>0)
       {
            return Redirect::back()->withErrors('Subcategory already Exist');

       }
       else

 {

          $category = $request->input('mainCategory');

    $main_category = DB::select("select* from main_category where main_category='$category' ");
    if(count($main_category)>0)
    {
        $item_id = $main_category[0]->item_id;
    }
    $sub_category = DB::select("select* from sub_category where main_category='$category' order by SKU desc");
    if(count($sub_category)>0)
    {
    $sub_item_id = $sub_category[0]->sub_item_id;
    $sub_item_id = substr($sub_item_id, strpos($sub_item_id, "-") + 1);
    $sub_item_id = substr($sub_item_id,2);
    $sub_item_id = $sub_item_id+1;
    }
    else{
        $sub_item_id = 1;
    }
    $sub_id = substr($cat,0,2);
    $sub_item_id = $item_id."-".$sub_id.$sub_item_id;
                 DB::insert("insert into sub_category (sub_item_id,main_category,sub_category) values (?,?,?)",array($sub_item_id,$category,$request->input('subCategory')));
                 return redirect('/admin/home/add/inventory');
                }
}


public function sub_category_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

      $result = DB::select("select* from sub_category");

      return view('admin.view_sub_category_list',compact('result'));

}

public function edit_sub_category_view($sku) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
  
      $result = DB::select("select* from main_category");
  
      $result1 = DB::select("select* from sub_category where SKU = '$sku'");
  
      return view('admin.edit_sub_category',compact('result','result1'));
  
  }

  
  public function edit_sub_category(Request $request, $sku) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
      {
          return redirect('/admin');
      }
        $category =$request->input('mainCategory');
                  $cat = $request->input('subCategory');
  
                          $result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
     'value' => $cat,
     'value2' => $main_category,
   ));
  
          if(count($result)>0)
          {
               return Redirect::back()->withErrors('Subcategory already Exist');
  
          }
          else
  
    {
  
        $main_category = DB::select("select* from main_category where main_category='$category' ");
        if(count($main_category)>0)
        {
            $item_id = $main_category[0]->item_id;
        }
        $sub_category = DB::select("select* from sub_category where SKU ='$sku'");
        if(count($sub_category)>0)
        {
        $sub_item_id = $sub_category[0]->sub_item_id;
        $sub_item_id = substr($sub_item_id, strpos($sub_item_id, "-") + 1);
        $sub_item_id = substr($sub_item_id,2);
        }
        else{
            $sub_item_id = 1;
        }
        $sub_id = substr($cat,0,2);
        $sub_item_id = $item_id."-".$sub_id.$sub_item_id;
      DB::table('sub_category')->where('SKU', $sku)->update(['sub_item_id' =>$sub_item_id,'main_category' =>$category,'sub_category' =>$cat]);
      return redirect('/admin/home/view/sub/category');
  
  }
  }

  public function delete_sub_category($id) {

    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
        return redirect('/admin');
    }

    DB::delete("delete from sub_category where SKU = '$id'");


    return redirect()->back();
   }

 

   public function add_account_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}

$account_name = DB::select("select * from account  ");
// return $account_name;

     return view('admin.add_account_view',compact('account_name'));
    }

//     public function add_account(Request $request) {
//         if(!(session()->has('type') && session()->get('type')=='admin'))
// {
//    return redirect('/admin');
// } 
           
//               $date = $request->input('date');
           
//               $subbb = $request->input('Cash_and_Cash_Equilants');
//               $Purchase = $request->input('Purchase');

                   

// $sub = $request->input('sub_account');
// // return $Purchase;

// // return $sub;
//             if(empty($sub) )
//             {
           
//               DB::insert("insert into account (account_type,account_name,description,balance,date) values (?,?,?,?,?)",array($request->input('Purchase'),$request->input('account_name'),$request->input('description'),$request->input('balance'),$date));
             

               
//             }
//             else
//             {
              
            
//               DB::insert("insert into account (account_type,sub_account,description,balance,date) values (?,?,?,?,?)",array($request->input('sub_account'),  $request->input('account_name'),$request->input('description'),$request->input('balance'),$date));
            
             
//             }


//              return redirect('/admin/home/view/account');
            
// }


public function add_account(Request $request) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
{
return redirect('/admin');
} 
     
        $date = $request->input('date');
     
$Cash_and_Cash_Equilants = $request->input('Cash_and_Cash_Equilants');
// return $Cash_and_Cash_Equilants;

$Purchase = $request->input('Purchase');

$Account_Reciveable = $request->input('Account_Reciveable');

$Account_Payable = $request->input('Account_Payable');

$Fixed_Asset = $request->input('Fixed_Asset');

$Expense = $request->input('Expense');

$Current_Asset = $request->input('Current_Asset');

$Revenue = $request->input('Revenue');

$Owners_Equity = $request->input('Owners_Equity');

$liabilities = $request->input('liabilities');

$detail_type = $request->input('detail_type');

if($request->input('detail_type')=='Cash_and_Cash_Equilants')
{
   $detail_type= 'Cash on Hand';
}elseif($request->input('detail_type')=='Account_Payable'){
   $detail_type= 'Account Payable';
}elseif($request->input('detail_type')=='Account_Reciveable')
{
   $detail_type= 'Liabilities';
}elseif($request->input('detail_type')=='Revenue')
{
   $detail_type= 'Sales Retail';
}
// return $detail_type;


// return $request->input('account_name');
$sub = $request->input('sub_account');
           
           
              if(empty($sub) )
      {
     
        DB::insert("insert into account (account_type,account_name,description,balance,date) values (?,?,?,?,?)",array($detail_type,$request->input('account_name'),$request->input('description'),$request->input('balance'),$date));
       

         
      }
      else
      {
        
      
        DB::insert("insert into account (account_type,sub_account,description,balance,date) values (?,?,?,?,?)",array($request->input('sub_account'),  $request->input('account_name'),$request->input('description'),$request->input('balance'),$date));
      
       
      } 
        $total_amount=  $request->input('balance');
if($request->input('detail_type') == "Capital")
      {
          $account = DB::select("select* from account where account_type = 'Cash on Hand'");
          if(count($account)>0)
          {
              $c_balance = $account[0]->increase + $total_amount; 
              // DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
              DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
          }
          else{

              DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
         
              }


     
          $accountss = DB::select("select* from account where account_type = 'Capital'");
           
          if(count($accountss)>0)
          {
              $c_balance = $accountss[0]->increase + $total_amount; 

              DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
    
          }
     
     
        }
           

       return redirect('/admin/home/view/account');
      
}





public function account_list_view() {
if(!(session()->has('type') && session()->get('type')=='admin'))
{
  
  return redirect('/admin');
}
// ->where('account.pk_id','account_receivable.acount_type_id')->where('account.pk_id','account_payable.acount_type_id')->
  // $result = DB::table('account')->join('account_receivable','account.pk_id','=','account_receivable.acount_type_id')->join('account_payable','account.pk_id','=','account_payable.acount_type_id')->select('account.*',DB::raw('SUM(account_receivable.amount_received) As account_receivable'),DB::raw('SUM(account_payable.amount_payed) As account_payable'))->get();
$result = DB::select('select * from account');
// $total_invest = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
// $recievable_sum = DB::table('account_receivable')->SUM('amount_received');
// // dd($recievable_sum);
// $payed_sum = DB::table('account_payable')->SUM('amount_payed');
// $expence_sum = DB::table('expense')->SUM('amount');
// $sale_sum = DB::table('sale')->where('sale_type','=','sale')->SUM('total_amount');
// $purchase_sum= DB::table('purchase')->where('purchase_type','=','purchase')->SUM('total_amount');
// // dd($purchase_sum);
//   // $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type = 'purchase'");

// // $sale_sum = DB::select("select SUM(total_amount) from sale where sale_type = 'sale'");
// // dd($sale_sum,$expence_sum);
// $result = json_decode(json_encode($result), true);
// $count = count($result);

// $result[0]['sum_amount']=1500;
// $result[1]['sum_amount']=$recievable_sum;
// $result[2]['sum_amount']=$payed_sum;
// $result[3]['sum_amount']=$expence_sum;
// $result[4]['sum_amount']=$sale_sum;
// $result[5]['sum_amount']=$purchase_sum;
// $result[6]['sum_amount']=$purchase_sum;
// $i = 7;
// if($count>7)
// {
//   foreach ($result as $value) {
//     $result[$i]['sum_amount'] = 'Not Connected';
//     if($i == $count)
//     break;
//   }
// }

// dd($result);
  return view('admin.view_account_list',compact('result'));

}




public function account_detailed_view(Request $request,$pk_id,$account_name) {
  if(!(session()->has('type') && session()->get('type')=='admin'))
  {
    return redirect('/admin');
  }
//  return $account_name;
 $sub_account = DB::select("select sub_account,account_name from account where pk_id= '$pk_id'");
//  return $sub_account;
 //  $result1= $result1[0]->account_name;
  // $sub_account =$sub_account[0]->sub_account ;

//  return $sub_account;

 
 if ($sub_account[0]->account_name=='Owners Equity')
 {
  //  return "sd";
   $resultbal = DB::select("select* from account where account_name='$account_name'   ");
    //  return $resultbal;
  $result3 = DB::select("select * from bank_deposit where main_account='$pk_id' ");
  $result4 = DB::select("select * from expense where main_account='$pk_id' ");
// $result4= DB::select("select amount from expense where main_account='$pk_id' ");
// $totat = DB::table('expense')->sum('amount');
  // return $result3; 
  return view('admin.view-machine-table', compact('result3','result4'));
 }

if ($sub_account[0]->sub_account=="$account_name")
{
  // return "inve";
    $resultbal = DB::select("select* from account where account_name='$account_name'   ");
    //  return $resultbal;
  $result = DB::select("select * from expense where account_name= '$pk_id'");
  // return $result;
  $result2 = DB::select("select * from bank_deposit where account_type= '$pk_id'");
  // return $result2;
  return view('admin.view_dec_account_detail', compact('result2','result','resultbal'));
}
if($sub_account[0]->sub_account=="$account_name"){
  // return "drr";
  $result = DB::select("select * from expense where account_name= '$pk_id'");
 $resultbal = DB::select("select* from account where account_name='$account_name'   ");

    return view('admin.view_dec_account_detail', compact('result','resultbal'));
}



  
  }
  





  public function manage_account_detailed_view(Request $request,$pk_id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    // return $pk_id;
   $sub_account = DB::select("select sub_account,account_name from account where pk_id= '$pk_id'");
  //  return $sub_account;

  $sub_accountss = DB::select("select account_name from account where pk_id= '$pk_id'");
  
  // $sub_accountss = DB::select("select pk_id from account where pk_id= '$pk_id'");
  
  // return $sub_accountss;

    $sub_accountss= $sub_accountss[0]->account_name;
    // return $sub_accountss;
    // $sub_account =$sub_account[0]->sub_account ;
  
  //  return $sub_accountss[0]->account_name;
  
   
   if ($sub_account[0]->account_name=='Owners Equity')
   {
    //  return "sd";
     $resultbal = DB::select("select* from account where account_name='$sub_accountss'   ");
    $result3 = DB::select("select * from bank_deposit where main_account='$pk_id' ");
    $result4 = DB::select("select * from expense where main_account='$pk_id' ");
  // $result4= DB::select("select amount from expense where main_account='$pk_id' ");
  
  // $totat = DB::table('expense')->sum('amount');
    // return $sub_accountss; 
    return view('admin.view-machine-table', compact('result3','result4','resultbal'));
   }
  //  return $sub_account[0]->account_name;
   if ($sub_account[0]->account_name== $sub_accountss)
   {
    //  return "sd";
      $resultbal = DB::select("select* from account where account_name='$sub_accountss'   ");
      $resultbale = $resultbal[0]->balance;
     
    $result3 = DB::select("select* from bank_deposit where account='$sub_accountss'   ");
    // return $result3;
    $resultnew = DB::select("select* from money_transfer where recive_account='$pk_id'   ");
    // $acc_name = DB::select("select account_name from account where account_name='$sub_accountss'   ");
    // $acc_name=$acc_name[0]->account_name;
    // return $result3;
   
    // return $result3;
    $result4 = DB::select("select * from expense where main_account='$pk_id' ");
    // return $result4;
  // $result4= DB::select("select amount from expense where main_account='$pk_id' ");
  // $totat = DB::table('expense')->sum('amount');
    // return $result3; 
    return view('admin.view-machine-table', compact('result3','result4','resultnew','resultbal'));
   }
  





 }





  // public function account_detailed_view($pk_id) {
  //   if(!(session()->has('type') && session()->get('type')=='admin'))
  //   {
  //     return redirect('/admin');
  //   }
   
  //     $result = DB::select("select * from expense where account_name= '$pk_id'");
  
  //     return view('admin.view_dec_account_detail', compact('result'));
    
  //   }
    
  

  public function balance(Request $request)
  {
      $value = $request->Input('cat_id');

      $subcategories = DB::select(DB::raw("SELECT * FROM account WHERE pk_id = :value") , array(
          'value' => $value,
      ));



      return $subcategories;

  }


public function edit_account_view($sku) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result = DB::select("select* from main_category");

  $result1 = DB::select("select* from sub_category where SKU = '$sku'");

  return view('admin.edit_sub_category',compact('result','result1'));

}


public function edit_account(Request $request, $sku) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
    $main_category =$request->input('mainCategory');
              $cat = $request->input('subCategory');

                      $result = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value and main_category= :value2"), array(
 'value' => $cat,
 'value2' => $main_category,
));

      if(count($result)>0)
      {
           return Redirect::back()->withErrors('Subcategory already Exist');

      }
      else

{



  DB::table('sub_category')->where('SKU', $sku)->update(['main_category' =>$main_category,'sub_category' =>$cat]);
  return redirect('/admin/home/view/sub/category');

}
}

public function delete_account($id) {

if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}

DB::delete("delete from sub_category where SKU = '$id'");


return redirect()->back();
}

///////////////////////////////////////////

public function sub(Request $request)
{
    $value = $request->Input('cat_id');


$subcategories = DB::select( DB::raw("SELECT * FROM sub_category WHERE main_category = :value"), array(
'value' => $value,
));


    return Response::json($subcategories);



}

public function add_inventory_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}

$result = DB::select("select * from main_category ORDER BY SKU DESC");

     return view('admin.add_inventory_view',compact('result'));
    }
    
    

    public function add_inventory(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}

$item = urldecode($request->input('item'));
$a =  $request->input('sub_item');
$name = $request->input('name');
$inventory = DB::select("select* from inventory where name = '$name'");
// return count($inventory);
if(count($inventory)>0)
{
    return Redirect::back()->withErrors('Inventory Name already Exist');
}
else{
$sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
'value' => $a,
));


if(count($sub_category)>0)
{
 $a = $sub_category[0]->sub_category;

}
else
{

$sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
'value' => $a,
));

if(count($sub_category)>0)

{
$a = $sub_category[0]->sub_category;
}
else{
$a = "";
}
}
$inventory = DB::select("select* from inventory where item ='$item' and sub_item = '$a' order by pk_id desc");
if(count($inventory)>0)
{
    $sub_category = DB::select("select* from sub_category where main_category = '$item' and sub_category='$a'");
    if(count($sub_category)>0)
    {
        $sub_item_id = $sub_category[0]->sub_item_id;
    }
    $sku = $inventory[0]->sku;
    
    $sku = substr($sku, strpos($sku, "-") + 1);
    $sku = substr($sku, strpos($sku, "-") + 1);
$sku = substr($sku,2);
$sku = $sku+1;

$inventory_id = substr($name,0,2);
$sku = $sub_item_id."-".$inventory_id.$sku;

}
else{
    $sub_category = DB::select("select* from sub_category where main_category = '$item' and sub_category='$a'");
    if(count($sub_category)>0)
    {
        $sub_item_id = $sub_category[0]->sub_item_id;
    }
    $inventory_id = substr($name,0,2);
    $sku = $sub_item_id."-".$inventory_id."1";
}

             DB::insert("insert into inventory (sku,item,sub_item,name,uom,stock,opening_balance,description) values (?,?,?,?,?,?,?,?)",array($sku,$item,$a,$request->input('name'),$request->input('uom'),$request->input('stock'),$request->input('opening_balance'),$request->input('description')));
             return redirect('/admin/home/view/inventory');
}
            
}
public function inventory_list_view() {
if(!(session()->has('type') && session()->get('type')=='admin'))
{
  return redirect('/admin');
}

  $result = DB::select("select* from inventory ORDER BY pk_id DESC");

  return view('admin.view_inventory_list',compact('result'));

}

public function inventory_detail_view($id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    
      $result = DB::select("select* from inventory where pk_id = '$id'");
    
      return view('admin.view_inventory_detail',compact('result'));
    
    }

public function edit_inventory_view($sku) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result1 = DB::select("select* from main_category");

  $result = DB::select("select* from inventory where pk_id = '$sku'");

  return view('admin.edit_inventory',compact('result','result1'));

}


public function edit_inventory(Request $request, $sku) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }
   
  $main_category = urldecode($request->input('item'));


  $a =  $request->input('sub_item');
  $name =  $request->input('name');
  $sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE sub_category = :value"), array(
'value' => $a,
));


if(count($sub_category)>0)
{
   $a = $sub_category[0]->sub_category;

}
else
{

$sub_category = DB::select( DB::raw("SELECT * FROM sub_category WHERE SKU = :value"), array(
'value' => $a,
));

if(count($sub_category)>0)

{
$a = $sub_category[0]->sub_category;
}
else{
  $a = "";
}
}

$inventory = DB::select("select* from inventory where item ='$main_category' and sub_item = '$a' and name = '$name'");
if(count($inventory)>0)
 {
    DB::table('inventory')->where('pk_id', $sku)->update(['uom'=>$request->input('uom'),'stock' =>$request->input('stock'),'opening_balance' =>$request->input('opening_balance')]);
 
 }
 else{
    $sub_category = DB::select("select* from sub_category where main_category = '$main_category' and sub_category='$a'");
    if(count($sub_category)>0)
        {
            $sub_item_id = $sub_category[0]->sub_item_id;
        }
        $inventory = DB::select("select * from inventory where pk_id = '$sku'");
        if(count($inventory)>0)
        {
            $in_id = $inventory[0]->sku;
            $in_id = substr($in_id, strpos($in_id, "-") + 1);
            $in_id = substr($in_id, strpos($in_id, "-") + 1);
            $in_id = substr($in_id,2);
            $inventory_id = substr($name,0,2);
            $in_id = $sub_item_id."-".$inventory_id.$in_id;
        }
}
  DB::table('inventory')->where('pk_id', $sku)->update(['sku' =>$in_id,'item' =>$main_category,'sub_item' =>$a,'name' =>$request->input('name'),'uom'=>$request->input('uom'),'stock' =>$request->input('stock'),'opening_balance' =>$request->input('opening_balance')]);
  return redirect('/admin/home/view/inventory');

}

public function delete_inventory($id) {

if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}

DB::delete("delete from inventory where pk_id = '$id'");


return redirect()->back();
}

/////////////////////

public function select_item(Request $request)
{
    $value = $request->Input('po_id');
  

$name = DB::select( DB::raw("SELECT * FROM inventory WHERE name = :value"), array(
'value' => $value,
));
return $name;
    
    return Response::json($name);
        
        

}



public function select_sku(Request $request)
{
    $value = $request->Input('po_id');
  
// return $value;

$sku = DB::select( DB::raw("SELECT * FROM inventory WHERE sku = :value"), array(
  'value' => $value,
  ));
  return $sku;

    return Response::json($sku);

}




public function add_sale_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}

$inventory = DB::select("select* from inventory");
$result = DB::select("select * from customer");
$sale = DB::select("select * from sale ORDER BY pk_id DESC");
$account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();

if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}


     return view('admin.add_sale_view',compact('result','sale_id','inventory','account_type'));
    }




    public function reciept_sale_add_view() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
  {
   return redirect('/admin');
  }
  

  $inventory = DB::select("select* from inventory");
  $result = DB::select("select * from customer");
  $sale = DB::select("select * from sale ORDER BY pk_id DESC");
  $account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
  
  if(count($sale)>0)
  {
      $sale_id = $sale[0]->pk_id + 1;
  }
  else{
      $sale_id = 1;
  }
  
  
       return view('admin.add_sale_receipt',compact('result','sale_id','inventory','account_type'));
      }
  
  



    public function add_sale_invioce_view() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
  {
   return redirect('/admin');
  }
  
  $inventory = DB::select("select* from inventory");
  $result = DB::select("select * from customer");
  $sale = DB::select("select * from sale ORDER BY pk_id DESC");
  $account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
  
  if(count($sale)>0)
  {
      $sale_id = $sale[0]->pk_id + 1;
  }
  else{
      $sale_id = 1;
  }
  
  
       return view('admin.add_invoice',compact('result','sale_id','inventory','account_type'));
      }


    public function add_sale(Request $request) {

        if(!(session()->has('type') && session()->get('type')=='admin'))
{

   return redirect('/admin');
}
   
if($request->input('sale_type') == "sale")
{

$total_amount = 0;
$sku = $request->input('sku');
// return $sku;
$wordCount = count($sku);
$item_name = $request->input('item_name');
$rate = $request->input('rate');
$quantity = $request->input('quantity');

$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}

$sale = "kachi parchi";
         
              DB::insert("insert into sale(bill_date,sale,customer_name,account_type,sale_type,company_name,vehicle_no,total_amount,created_at) values (?,?,?,?,?,?,?,?,?)",array($request->input('date'),$sale,$request->input('customer_name'),$request->input('account_type'),$request->input('sale_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount,$request->input('date')));
             
              $result = DB::select("select* from sale order by pk_id DESC");
             for($i = 0;  $i < $wordCount ; $i++)
             {
                 $amount = $quantity[$i] * $rate[$i];
                DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
                $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                if(count($inventory)>0)
                {
                    $stock = $inventory[0]->stock - $quantity[$i];
                    DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                }
     
            }

            
            $c_name = $request->input('customer_name');
            // return $c_name;
            $cus_name = DB::select("select* from customer where pk_id = '$c_name'");
            $c_balance = $cus_name[0]->current_balance + $total_amount; 
            DB::table('customer')->where('pk_id',$c_name)->update(['current_balance' =>$c_balance]);
           

          // if($request->input('account_type'))
          //   {
          //     DB::enableQueryLog();
          //         $account_type_id = $request->input('account_type');
          //         $account = DB::select("select* from account where pk_id =".$account_type_id);
          //         $purchase_account = DB::select("select* from account where account_type = 'Purchase Manegment'");
          //                    $query = DB::getQueryLog();
          //       // print_r($query);
          //       // dd($account, $account_type_id);
          //       if(count($account)>0)
          //       {
          //         if(isset($purchase_account[0])){
          //         $puchase_amount = $purchase_account[0]->balance-$total_amount;
          //          $result = DB::table('account')->where('account_type','Purchase Manegment')->update(['balance' =>$puchase_amount]);
          //       }
          //        $sale_account = DB::select("select* from account where account_type ='Sale Manegment'");
          //       if(isset($sale_account[0]) && !empty($sale_account[0]))
          //       {
          //         $sale_balance = $sale_account[0]->balance + $total_amount;

          //         $result = DB::table('account')->where('pk_id',$sale_account[0]->pk_id)->update(['balance' =>$sale_balance]);
          //       }
          //           $c_balance = $account[0]->balance + $total_amount; 
          //           $result = DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                    

              
          //       }
          //       else{

          //           DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
               
          //           }
          //       }


            if($request->input('account_type') == "credit")
            {
                $account = DB::select("select* from account where account_type = 'Sales Retail'");
                if(count($account)>0)
                {
                    $c_balance = $account[0]->balance + $total_amount; 
                    $c_balance_increase = $account[0]->increase + $total_amount;
                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance_increase]);
                }
                else{

                    DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
               
                    }


                $c_name = $request->input('customer_name');
                $cus_name = DB::select("select* from customer where pk_id = '$c_name'");
                $c_balance = $cus_name[0]->current_balance - $total_amount; 
                DB::table('customer')->where('pk_id',$c_name)->update(['current_balance' =>$c_balance]);
           
                $accountss = DB::select("select* from account where account_type = 'Liabilities'");
                 
                if(count($accountss)>0)
                {
                    $c_balance = $accountss[0]->increase + $total_amount; 

                    DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
          
                }
           
           
              }

// ======================= Cash ==========================//

            if($request->input('account_type') == "cash")
            {
              
                $account = DB::select("select* from account where account_type = 'Cash on Hand'");
               
                if(count($account)>0)
                {
                    $c_balance = $account[0]->balance + $total_amount; 
                    $c_balance_increase = $account[0]->increase + $total_amount;
                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance_increase]);
                }
                    else{

                DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
           
                    }




                    $accountss = DB::select("select* from account where account_type = 'Sales Retail'");
                 
                    if(count($accountss)>0)
                    {
                        $c_balance = $accountss[0]->increase + $total_amount; 

                        DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
              
                    }
        }

        }
        else{
            return "false";
        }


         return redirect('/admin/home/view/sale/by/customer');
            
}




public function reciept_sale_add(Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
{

return redirect('/admin');
}

$sale_type = $request->input('sale_type');
if($sale_type=="sale")
{
return "asd";

$total_amount = 0;
$sku = $request->input('sku');
// return $sku;
$wordCount = count($sku);
$item_name = $request->input('item_name');

$description = $request->input('description');

$date = $request->input('date');

$item_name = $request->input('item_name');
$address = DB::select("select* from customer where pk_id = '$customer_name'");

$address= $address[0]->billing_address;

$rate = $request->input('rate');
$quantity = $request->input('quantity');
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
$total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}

$sale = "Receipt";
   

DB::insert("insert into sale(bill_date,address,sale,customer_name,account_type,sale_type,company_name,vehicle_no,total_amount,created_at) values (?,?,?,?,?,?,?,?,?,?)",array($request->input('date'),$address,$sale,$request->input('customer_name'),$request->input('account_type'),$sale_type,$request->input('company_name'),$request->input('vehicle_no'),$total_amount,$request->input('date')));
       
        $result = DB::select("select* from sale order by pk_id DESC");
       for($i = 0;  $i < $wordCount ; $i++)
       {
           $amount = $quantity[$i] * $rate[$i];
          DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
          $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
         
          if(count($inventory)>0)
          {
              $stock = $inventory[0]->stock - $quantity[$i];
              DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
          }


          if($request->input('account_type') == "cash")
          {
            
              $account = DB::select("select* from account where account_type = 'Cash on Hand'");
             
              if(count($account)>0)
              {
                  $c_balance = $account[0]->balance + $amount; 
                  $c_balance_increase = $account[0]->increase + $amount; 
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance_increase]);
              }
                  else{
    
              DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
         
                  }
    
    
    
    
                  $accountss = DB::select("select* from account where account_type = 'Sales Retail'");
               
                  if(count($accountss)>0)
                  {
                      $c_balance = $accountss[0]->balance + $amount; 
                      $c_balance_increase = $accountss[0]->increase + $amount; 
                      DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                      DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance_increase]);
            
                  }
      }
      $c_name = $request->input('customer_name');
      // return $c_name;
      $cus_name = DB::select("select* from customer where pk_id = '$c_name'");
      $c_balance = $cus_name[0]->current_balance + $amount; 
      DB::table('customer')->where('pk_id',$c_name)->update(['current_balance' =>$c_balance]);

      }
     

      DB::insert("insert into sale_receipt (sale_id,customer_name,address,date,account_type,ref_no,description) values (?,?,?,?,?,?,?)",
      array($result[0]->pk_id,$request->input('customer_name'),$request->input('address'),$request->input('date'),$request->input('account_type'),$request->input('ref_no'),$request->input('description')));
       


}
elseif($sale_type=="return")
{
  
$total_amount = 0;
$sku = $request->input('sku');
// return $sku;
$wordCount = count($sku);
$item_name = $request->input('item_name');

$description = $request->input('description');

$date = $request->input('date');

$item_name = $request->input('item_name');

$customer_name=$request->input('customer_name');

$address = DB::select("select* from customer where pk_id = '$customer_name'");

$address= $address[0]->billing_address;

$rate = $request->input('rate');
$quantity = $request->input('quantity');
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
$total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}

$sale = "Receipt";
   

        DB::insert("insert into sale(bill_date,address,sale,customer_name,account_type,sale_type,company_name,vehicle_no,total_amount,created_at) values (?,?,?,?,?,?,?,?,?,?)",array($request->input('date'),$address,$sale,$request->input('customer_name'),$request->input('account_type'),$sale_type,$request->input('company_name'),$request->input('vehicle_no'),$total_amount,$request->input('date')));
       
        $result = DB::select("select* from sale order by pk_id DESC");
       for($i = 0;  $i < $wordCount ; $i++)
       {
           $amount = $quantity[$i] * $rate[$i];
          DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
          $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
         
          if(count($inventory)>0)
          {
              $stock = $inventory[0]->stock + $quantity[$i];
              DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
          }
          if($request->input('account_type') == "cash")
          {
            
              $account = DB::select("select* from account where account_type = 'Cash on Hand'");
             
              if(count($account)>0)
              {
                  $c_balance = $account[0]->balance + $amount; 
                  $c_balance_decrease = $account[0]->decrease + $amount; 
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['decrease' =>$c_balance_decrease]);
              }
                  else{
    
              DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
         
                  }
    
    
    
    
                  $accountss = DB::select("select* from account where account_type = 'Sales Retail'");
               
                  if(count($accountss)>0)
                  {
                    $c_balance = $accountss[0]->balance + $amount; 
                      $c_balance_decrease = $accountss[0]->decrease + $amount; 
                      DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                      DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['decrease' =>$c_balance_decrease]);
            
                  }
      }

      $c_name = $request->input('customer_name');
      // return $c_name;
      $cus_name = DB::select("select* from customer where pk_id = '$c_name'");
      $c_balance = $cus_name[0]->current_balance - $amount; 
      DB::table('customer')->where('pk_id',$c_name)->update(['current_balance' =>$c_balance]);

      }
     

      DB::insert("insert into sale_receipt (sale_id,customer_name,address,date,account_type,ref_no,description) values (?,?,?,?,?,?,?)",
      array($result[0]->pk_id,$request->input('customer_name'),$address,$request->input('date'),$request->input('account_type'),$request->input('ref_no'),$request->input('description')));
       


  


}
 


   return redirect('/admin/home/view/sale/by/customer');
      
}




public function add_sale_invioce(Request $request) {

  if(!(session()->has('type') && session()->get('type')=='admin'))
{

return redirect('/admin');
}
$sale_type = $request->input('sale_type');
if($sale_type=="sale")
{
  // return "sale ha";

$total_amount = 0;
$sku = $request->input('sku');
// return $sku;
$wordCount = count($sku);
$item_name = $request->input('item_name');
// return $item_name;
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$desc = $request->input('description');
// return $request->input('customer_name');
$customer_name=$request->input('customer_name');
// return $customer_name;
$address = DB::select("select* from customer where pk_id = '$customer_name'");

$address= $address[0]->billing_address;
// return $address;
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
$total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}

$inventory = DB::select("select* from inventory where name = '$item_name[0]'");

$inventory= $inventory[0]->stock;
// return $quantity[0];
if($inventory>0 && $quantity[0]<=$inventory)
{

$sale = "invoice";
   $account_type = "credit";
   DB::insert("insert into sale(bill_date,due_date,sale,address,customer_name,account_type,sale_type,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('date'),$request->input('date2'),$sale,$address,$request->input('customer_name'),$account_type,$sale_type,$total_amount));
       
        $result = DB::select("select* from sale order by pk_id DESC");
       for($i = 0;  $i < $wordCount ; $i++)
       {
           $amount = $quantity[$i] * $rate[$i];
          //  return $amount;
          DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
          $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
          if(count($inventory)>0)
          {
              $stock = $inventory[0]->stock - $quantity[$i];
              DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
          }



          if($account_type == "credit")
          {
              $account = DB::select("select* from account where account_type = 'Sales Retail'");
              if(count($account)>0)
              {
                  $c_balance = $account[0]->increase + $amount; 
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
              }
              else{
    
                  DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
             
                  }
    
         
              $accountss = DB::select("select* from account where account_type = 'Liabilities'");
               
              if(count($accountss)>0)
              {
                  $c_balance = $accountss[0]->increase + $amount; 
    
                  DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
        
              }
         
         
            }



      }
    }
    else
    {
     
      return Redirect::back()->withErrors('Inventory kam han!...');

    }
   

  

}
elseif($sale_type=="return")
{
// return "return";


$total_amount = 0;
$sku = $request->input('sku');
// return $sku;
$wordCount = count($sku);
$item_name = $request->input('item_name');
// return $item_name;
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$desc = $request->input('description');
// return $request->input('customer_name');
$customer_name=$request->input('customer_name');
// return $customer_name;
$address = DB::select("select* from customer where pk_id = '$customer_name'");

$address= $address[0]->billing_address;
// return $address;
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
$total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}



$sale = "invoice";
   $account_type = "credit";
        DB::insert("insert into sale(bill_date,due_date,sale,address,customer_name,account_type,sale_type,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('date'),$request->input('date2'),$sale,$address,$request->input('customer_name'),$account_type,$sale_type,$total_amount));
       
        $result = DB::select("select* from sale order by pk_id DESC");
       for($i = 0;  $i < $wordCount ; $i++)
       {
           $amount = $quantity[$i] * $rate[$i];
          //  return $amount;
          DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
          $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
          if(count($inventory)>0)
          {
              $stock = $inventory[0]->stock + $quantity[$i];
              DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
          }



          if($account_type == "credit")
          {
              $account = DB::select("select* from account where account_type = 'Sales Retail'");
              if(count($account)>0)
              {
                  $c_balance_dec = $account[0]->decrease + $amount; 
                  $c_balance = $account[0]->balance - $amount; 
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                  DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['decrease' =>$c_balance_dec]);
              }
              else{
    
                  DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
             
                  }
    
         
              $accountss = DB::select("select* from account where account_type = 'Liabilities'");
               
              if(count($accountss)>0)
              {
                  $c_balance_decre = $accountss[0]->decrease + $amount; 
                  $c_balance = $account[0]->balance - $amount; 
                  DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['balance' =>$c_balance]);
                  DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['decrease' =>$c_balance_decre]);
              }
         
         
            }



      }
   
   




}


   return redirect('/admin/home/view/sale/by/customer');
      
}






public function sale_by_customer_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }

    
    $total_amount = DB::select("select SUM(total_amount) from sale where sale_type = 'sale'");
              
      $result = DB::select("select* from customer");
       $result2 = DB::select("select* from sale");
    
      return view('admin.sale_by_customer_list_view',compact('result2','result','total_amount'));
    
    }


    public function all_sale() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
      {
        return redirect('/admin');
      }
  
      
      $total_amount = DB::select("select SUM(total_amount) from sale ");
      $item_name = DB::select("select* from sale,detail_sale where detail_sale.sale_id = sale.pk_id  "); 

      $item_name2 = DB::select("select* from sale,detail_tax_sale where detail_tax_sale.sale_id = sale.pk_id  "); 

      $cus_name = DB::select("select customer_name from sale,detail_sale where detail_sale.sale_id = sale.pk_id  "); 
      
      // return $item_name;
      
        $result = DB::select("select* from customer");
         $result2 = DB::select("select* from sale");
      
        return view('admin.all_sale',compact('result2','item_name2','result','total_amount','item_name','cus_name'));
      
      }


    public function sale_list_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $result1 = DB::select("select* from customer where pk_id = '$id'");
        $result3 = DB::select("select* from sale where pk_id = '$id'");
      //  return  $id;
//         $customer = $result3[0]->customer_name;
// return $customer;
          $result = DB::select("select* from sale where customer_name = '$id' and (sale = 'invoice' or sale = 'tax')");
          // return $result;
          $total= $result[0]->total_amount;
          $sale_id = $result[0]->pk_id;
          $customer = $result[0]->customer_name;
         $customer_name = $result1[0]->customer_name;
        //  $customer = $result1[0]->customer_name;
        //  $total= $result1[0]->total_amount;


       

            // $result11 = DB::select("select* from sale where customer_name = '$id' and sale_type = 'sale'");
            $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale_type = 'sale' ");
         


         $customer2 = DB::select("select* from customer where pk_id = '$customer'");
         $due_date = DB::select("select* from sale_invoice where customer_name = '$customer_name' ");
// return $result;
          $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale = 'invoice'");
       
          return view('admin.view_sale_list',compact('new_total','sale_id','result3','customer2','result','result1','total_amount'));
    
        }
        
        public function create_payment_sale_view_test($id,$sale) {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
          // return $id;
          $result1 = DB::select("select* from sale where pk_id = '$id'");
          $customer = $result1[0]->customer_name;
          $total= $result1[0]->total_amount;
          $customer2 = DB::select("select* from customer where pk_id = '$customer'");
         

          // $remain = DB::select("select* from sale_invoice where sale_id = '$id'");

          $remain = DB::table('sale_invoice')->where('sale_id',$id)->sum('partial');
if($remain>0)
{
 $new_total= $total - $remain;
//  return $new_total;
}else
{
  $new_total=$total;
}

            $result = DB::select("select* from sale where customer_name = '$id' and sale_type = 'sale'");
            $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale_type = 'sale'");
         
            return view('admin.receive_payment',compact('total','result','new_total','customer2','result1','total_amount'));
      
          }









        public function sale_list_view_receipt($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        // return "jhhh";
        $result1 = DB::select("select* from customer where pk_id = '$id'");
        
          $result = DB::select("select* from sale where customer_name = '$id' and sale = 'receipt'");

         $customer_name = $result1[0]->customer_name;
 
         $due_date = DB::select("select* from sale_receipt where customer_name = '$customer_name' ");
// return $result;
          $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale = 'receipt'");
       
          return view('admin.view_sale_list_receipt',compact('result','result1','total_amount'));
    
        }
        
        
        
        
        


        public function create_payment_purchase_view($id) {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
          // return $id;
          $result1 = DB::select("select* from purchase where pk_id = '$id'");
          $supplier = $result1[0]->supplier_name;
          $total= $result1[0]->total_amount;
          $supplier2 = DB::select("select* from supplier where pk_id = '$supplier'");
          // return $supplier2;
         

          // $remain = DB::select("select* from sale_invoice where sale_id = '$id'");

          $remain = DB::table('purchase_invoice')->where('purchase_id',$id)->sum('partial');
if($remain>0)
{
 $new_total= $total - $remain;
//  return $new_total;
}else
{
  $new_total=$total;
}

            $result = DB::select("select* from purchase where supplier_name = '$id' and purchase_type = 'purchase'");
            $total_amount = DB::select("select SUM(total_amount) from purchase where supplier_name = '$id' and purchase_type = 'purchase'");
         
            return view('admin.receive_payment_purchase',compact('total','result','new_total','supplier2','result1','total_amount'));
      
          }

          public function create_payment_purchase(Request $request,$id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            // return $id;
            

// return $result;

            $supplier_name = $request->input('supplier_name');
            // return $supplier_name;
            $date = $request->input('date');
            $account_type = $request->input('account_type');
            $deposit_to = $request->input('deposit_to');
            $description = $request->input('description');
            // $due_date = $request->input('due_date');

            $org_amount = $request->input('org_amount');
            // return $org_amount;
            $partial = $request->input('partial');
            $result = DB::select("select* from purchase_invoice where purchase_id= '$id'  ");
 

            if(count($result)>0)
            {
              
     $sum = DB::table('purchase_invoice')->where('purchase_id',$id)->sum('partial');
     $result2 = DB::select("select* from purchase_invoice where purchase_id= '$id' ORDER BY pk_id DESC ");

     $sum2=$org_amount - $sum ;
// return $sum2;
 if($partial <= $sum2)
 {


     
              $paymentt1 = $result2[0]->remain;
              $payment1 = $paymentt1 - $partial;
              // return $sum;
              DB::insert("insert into purchase_invoice 
              (purchase_id,supplier_name,date,account_type,deposit_to,description,org_amount,partial,remain) 
              values (?,?,?,?,?,?,?,?,?)",
              array($id,$supplier_name,$date,$account_type,$deposit_to,$description,$org_amount,$partial,$payment1));
              
     $summ = DB::table('purchase_invoice')->where('purchase_id',$id)->sum('partial');
              $resultt=  DB::table('purchase')->where('pk_id', $id)->update(['paid_amount' =>$summ]);

 
              $s_name = $request->input('supplier_name');
              $cus_name = DB::select("select* from supplier where supplier_name = '$s_name'");
              $c_balance = $cus_name[0]->current_balance + $partial; 
              $update= DB::table('supplier')->where('supplier_name',$s_name)->update(['current_balance' =>$c_balance]);
             

                  
                    
            }else
            {
              $c_name = $request->input('supplier_name');
              $cus_name = DB::select("select* from supplier where supplier_name = '$c_name'");
              $id= $cus_name[0]->pk_id;
              // return $id;
              return redirect('admin/home/view/purchase/'.$id)->withErrors('Payment Acceed!...');
              
            }
             
            }
            elseif($partial <= $org_amount)
            {
              $payment1 = $org_amount - $partial;
                //  return "f";  
                
              DB::insert("insert into purchase_invoice (purchase_id,supplier_name,date,account_type,deposit_to,description,org_amount,partial,remain) values (?,?,?,?,?,?,?,?,?)",
              array($id,$supplier_name,$date,$account_type,$deposit_to,$description,$org_amount,$partial,$payment1));
              $resultt=  DB::table('purchase')->where('pk_id', $id)->update(['paid_amount' =>$partial]);

              $s_name = $request->input('supplier_name');
              $cus_name = DB::select("select* from supplier where supplier_name = '$s_name'");
              // return $partial;
              $c_balance = $cus_name[0]->current_balance + $partial; 
             $update= DB::table('supplier')->where('supplier_name',$s_name)->update(['current_balance' =>$c_balance]);
             

                    
            }else
            {
              $c_name = $request->input('supplier_name');
              $cus_name = DB::select("select* from supplier where supplier_name = '$c_name'");
              $id= $cus_name[0]->pk_id;
              // return $id;
              return redirect('admin/home/view/purchase/'.$id)->withErrors('Payment Acceed!...'); 
            
            }
                  
              $c_name = $request->input('supplier_name');
              $cus_name = DB::select("select* from supplier where supplier_name = '$c_name'");
              $id= $cus_name[0]->pk_id;
              // return $id;
              return redirect('admin/home/view/purchase/'.$id)->withErrors('Payment recives Successfully!...'); 
            
          
            }

        public function create_payment_sale_view($id,$sale) {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
          // return $id;
          $result1 = DB::select("select* from sale where pk_id = '$id'");
          $customer = $result1[0]->customer_name;
          $total= $result1[0]->total_amount;
          $customer2 = DB::select("select* from customer where pk_id = '$customer'");
         

          // $remain = DB::select("select* from sale_invoice where sale_id = '$id'");

          $remain = DB::table('sale_invoice')->where('sale_id',$id)->sum('partial');
if($remain>0)
{
 $new_total= $total - $remain;
//  return $new_total;
}else
{
  $new_total=$total;
}

            $result = DB::select("select* from sale where customer_name = '$id' and sale_type = 'sale'");
            $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale_type = 'sale'");
         
            return view('admin.receive_payment',compact('total','result','new_total','customer2','result1','total_amount'));
      
          }


          public function create_payment_sale(Request $request,$id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            // return $id;
            

// return $result;

            $customer_name = $request->input('customer_name');
           
            $date = $request->input('date');
            $account_type = $request->input('account_type');
            $deposit_to = $request->input('deposit_to');
            $description = $request->input('description');
            $due_date = $request->input('due_date');

            $org_amount = $request->input('org_amount');
            // return $org_amount;
            $partial = $request->input('partial');
            $result = DB::select("select* from sale_invoice where sale_id= '$id'  ");
 

            if(count($result)>0)
            {
              
     $sum = DB::table('sale_invoice')->where('sale_id',$id)->sum('partial');
     $result2 = DB::select("select* from sale_invoice where sale_id= '$id' ORDER BY pk_id DESC ");

     $sum2=$org_amount - $sum ;
// return $sum2;
 if($partial <= $sum2)
 {


     
              $paymentt1 = $result2[0]->remain;
              $payment1 = $paymentt1 - $partial;
              // return $sum;
              DB::insert("insert into sale_invoice 
              (sale_id,customer_name,date,account_type,deposit_to,description,due_date,org_amount,partial,remain) 
              values (?,?,?,?,?,?,?,?,?,?)",
              array($id,$customer_name,$date,$account_type,$deposit_to,$description,
              $due_date,$org_amount,$partial,$payment1));
              
     $summ = DB::table('sale_invoice')->where('sale_id',$id)->sum('partial');
     
    //  $paid_bal_update=  DB::table('sale')->where('pk_id', $id)->update(['paid_amount' =>'0']);
     
              $resultt=  DB::table('sale')->where('pk_id', $id)->update(['paid_amount' =>$summ]);


              $c_name = $request->input('customer_name');
            //   return $c_name;
              $cus_name = DB::select("select* from customer where customer_name = '$c_name'");
              $c_balance = $cus_name[0]->current_balance + $partial; 
            //   return $c_balance;
               DB::table('customer')->where('customer_name',$c_name)->update(['current_balance' =>$c_balance]);
             

                  
                    
            }else
            {
              $c_name = $request->input('customer_name');
              $cus_name = DB::select("select* from customer where customer_name = '$c_name'");
              $id= $cus_name[0]->pk_id;
              // return $id;
              return redirect('admin/home/view/sale/'.$id)->withErrors('Payment Acceed!...');;
          
            }
             
            }
            elseif($partial <= $org_amount)
            {
              $payment1 = $org_amount - $partial;
                //  return "f";  
                
              DB::insert("insert into sale_invoice (sale_id,customer_name,date,account_type,deposit_to,description,due_date,org_amount,partial,remain) values (?,?,?,?,?,?,?,?,?,?)",
              array($id,$customer_name,$date,$account_type,$deposit_to,$description,$due_date,$org_amount,$partial,$payment1));
              $resultt=  DB::table('sale')->where('pk_id', $id)->update(['paid_amount' =>$partial]);

              $c_name = $request->input('customer_name');
              $cus_name = DB::select("select* from customer where customer_name = '$c_name'");
              // return $partial;
              $c_balance = $cus_name[0]->current_balance + $partial; 
             $update= DB::table('customer')->where('customer_name',$c_name)->update(['current_balance' =>$c_balance]);
             

                    
            }else{

              $c_name = $request->input('customer_name');
              $cus_name = DB::select("select* from customer where customer_name = '$c_name'");
              $id= $cus_name[0]->pk_id;
              // return $id;
              return redirect('admin/home/view/sale/'.$id)->withErrors('Payment Acceed!...');
            }
                   
            $c_name = $request->input('customer_name');
            $cus_name = DB::select("select* from customer where customer_name = '$c_name'");
            $id= $cus_name[0]->pk_id;
            // return $id;
            return redirect('admin/home/view/sale/'.$id)->withErrors('Payment Recieved Successfully!...');
        
            
            }
  

            

        public function sale_return_by_customer_list_view() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            $total_amount = DB::select("select SUM(total_amount) from sale where sale_type = 'sale return'");
                      
              $result = DB::select("select* from customer");
            
              return view('admin.sale_return_by_customer_list_view',compact('result','total_amount'));
            
            }

            public function sale_return_list_view($id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
                $result1 = DB::select("select* from customer where pk_id = '$id'");
                
                  $result = DB::select("select* from sale where customer_name = '$id' and sale_type = 'sale return'");
                  $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' and sale_type = 'sale return'");
                
                  return view('admin.view_sale_return_list',compact('result','result1','total_amount'));
                
                }
               
                
                public function sale_return_detail_view($id) {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
                 
                      $result = DB::select("select* from detail_sale where sale_id = '$id'");
                      $result1 = DB::select("select* from sale where pk_id = '$id'");
                      $customer = $result1[0]->customer_name;
                      $customer = DB::select("select* from customer where pk_id = '$customer'");
                      return view('admin.sale_return_detail_view',compact('result','result1','customer'));
                    
                    }


                    public function sale_detailed_by_customer($id) {
                      if(!(session()->has('type') && session()->get('type')=='admin'))
                      {
                        return redirect('/admin');
                      }
                      // return $id;
          //             if($sale == "tax")
          //  {
          //     $result = DB::select("select* from detail_tax_sale where sale_id = '$id'");
          //  }
          //  else{
                $result = DB::select("select* from detail_sale where sale_id = '$id'");
          //  }
// return $result;
                $result1 = DB::select("select* from sale where pk_id = '$id'");
                $customer = $result1[0]->customer_name;
                $customer = DB::select("select* from customer where pk_id = '$customer'");
                return view('admin.sale_detail_by_customer',compact('result','result1','customer','sale'));
                      
                      }
                      
                      
                      
                      
                    public function purchase_detailed_by_customer($id) {
                      if(!(session()->has('type') && session()->get('type')=='admin'))
                      {
                        return redirect('/admin');
                      }
                      // return $id;
          //             if($sale == "tax")
          //  {
          //     $result = DB::select("select* from detail_tax_sale where sale_id = '$id'");
          //  }
          //  else{
                $result = DB::select("select* from detail_purchase where purchase_id = '$id'");
          //  }
// return $result;
                $result1 = DB::select("select* from purchase where pk_id = '$id'");
                $customer = $result1[0]->supplier_name;
                $customer = DB::select("select* from supplier where pk_id = '$customer'");
                return view('admin.purchase_detail_by_customer',compact('result','result1','customer','sale'));
                      
                      }
                      
                      
                      


                      public function sale_detailed_by_customer_name($id) {
                        if(!(session()->has('type') && session()->get('type')=='admin'))
                        {
                          return redirect('/admin');
                        }
                        // return $id;
            //             if($sale == "tax")
            //  {
            //     $result = DB::select("select* from detail_tax_sale where sale_id = '$id'");
            //  }
            //  else{
                  $result = DB::select("select* from detail_sale where sale_id = '$id'");
            //  }
  // return $result;
                  $result1 = DB::select("select* from sale where customer_name = '$id'");
                  // $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' ");
                
     $total_amount = DB::table('sale')->where('customer_name',$id)->sum('total_amount');
                  // $customer = $result1[0]->customer_name;
                  $customer = DB::select("select* from customer where pk_id = '$id'");
                //  return $total_amount;
                  return view('admin.view_sale_customer',compact('total_amount','result','result1','customer','sale'));
                        
                        }
  


        public function sale_detail_view($id,$sale) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            // return $id;
            if($sale == "tax")
 {
    $result = DB::select("select* from detail_tax_sale where sale_id = '$id'");
 }
 else{
      $result = DB::select("select* from detail_sale where sale_id = '$id'");
 }
      $result1 = DB::select("select* from sale where pk_id = '$id'");
      $customer = $result1[0]->customer_name;
      $customer = DB::select("select* from customer where pk_id = '$customer'");
      return view('admin.sale_detail_view',compact('result','result1','customer','sale'));
            
            }

            public function edit_sale_view($id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                      return redirect('/admin');
                  }
                
                  $result1 = DB::select("select* from sale where pk_id = '$id'");
                  $customer = $result1[0]->customer_name;
                  $customer = DB::select("select* from customer");
                  $inventory = DB::select("select* from inventory");
                  $result = DB::select("select* from detail_sale where sale_id = '$id'");
                
                  return view('admin.edit_sale_view',compact('result','result1','customer','inventory'));
                
                }


                public function edit_sale(Request $request, $id) {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                      {
                          return redirect('/admin');
                      }
                    
                      $total_amount = 0;
                    $sku = $request->input('sku');
                    $wordCount = count($sku);
                    $item_name = $request->input('item_name');
                    $rate = $request->input('rate');
                    $quantity = $request->input('quantity');
                    $i = 0;
                    for($i = 0;  $i < $wordCount ; $i++)
                    {
                        $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
                    }
                    DB::table('sale')->where('pk_id', $id)->update(['customer_name' =>$request->input('customer_name'),'account_type' =>$request->input('account_type'),'sale_type' =>$request->input('sale_type'),'company_name' =>$request->input('company_name'),'vehicle_no'=>$request->input('vehicle_no'),'total_amount' =>$total_amount]);
                     
                        DB::delete("delete from detail_sale where sale_id = '$id'");
                                 for($i = 0;  $i < $wordCount ; $i++)
                                 {
                                     $amount = $quantity[$i] * $rate[$i];
                                    DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
                                 }
                    
                    
                     return redirect('/admin/home/view/sale/by/customer');
                    
                    }

public function delete_sale($id) {

if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}

DB::delete("delete from inventory where pk_id = '$id'");


return redirect()->back();
}

/////////////////////
public function add_sale_tax_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
   
 return redirect('/admin')->withErrors('Login Please!...');
}
// else{
//   return Redirect::back()->withErrors('Logged!...');
// }
$inventory = DB::select("select* from inventory");
$result = DB::select("select * from customer");
$sale = DB::select("select * from sale ORDER BY pk_id DESC");
$account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}


     return view('admin.add_sale_tax_view',compact('result','sale_id','inventory','account_type'));
    }


public function add_sale_tax(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}
$sale_type = $request->input('sale_type');
if($sale_type=="sale")
{
$total_amount = 0;
$sku = $request->input('sku');
$wordCount = count($sku);
$item_name = $request->input('item_name');
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$tax = $request->input('tax');
$tax_amount = $request->input('tax_amount');
$amount = $request->input('amount');
$receiving_method = "bank";
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + $amount[$i];
}
$inventory = DB::select("select* from inventory where name = '$item_name[0]'");

$inventory= $inventory[0]->stock;
// return $quantity[0];
if($inventory>0 && $quantity[0]<=$inventory)
{
$sale = "tax";
// dd($request->all());
             DB::insert("insert into sale (sti,sale,customer_name,account_type,sale_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('sti'),$sale,$request->input('customer_name'),$request->input('account_type'),$request->input('sale_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
             $result = DB::select("select* from sale order by pk_id DESC");
             for($i = 0;  $i < $wordCount ; $i++)
             {
                DB::insert("insert into detail_sale (sale_id,sku,item_name,quantity,rate,tax,tax_amount,amount) values (?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$tax[$i],$tax_amount[$i],$amount[$i]));
                $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                if(count($inventory)>0)
                {
                    $stock = $inventory[0]->stock - $quantity[$i];
                    DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                }
      
            
                if($request->input('account_type') == "credit")
                {
                    $account = DB::select("select* from account where account_type = 'Sales Retail'");
                    if(count($account)>0)
                    {
                        $c_balance = $account[0]->increase + $total_amount; 
                        $c_balance_bal = $account[0]->balance + $total_amount; 
                        DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance_bal]);
                        DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
                    }
                    else{
                
                        DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
                   
                        }
                
                
                 
                
                    $accountss = DB::select("select* from account where account_type = 'Account Receivable'");
                     
                    if(count($accountss)>0)
                    {
                        $c_balance = $accountss[0]->increase + $total_amount; 
                        $c_balance_bal = $accountss[0]->balance + $total_amount; 
                        DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
                        DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['balance' =>$c_balance_bal]);
                    }
                
                
                  }
            
            
            
              }
            }
            else
            {
             
              return Redirect::back()->withErrors('Inventory kam han!...');
        
            }

            }

elseif($sale_type=="return")
{

  $total_amount = 0;
  $sku = $request->input('sku');
  $wordCount = count($sku);
  $item_name = $request->input('item_name');
  $rate = $request->input('rate');
  $quantity = $request->input('quantity');
  $tax = $request->input('tax');
  $tax_amount = $request->input('tax_amount');
  $amount = $request->input('amount');
  $receiving_method = "bank";
  $i = 0;
  for($i = 0;  $i < $wordCount ; $i++)
  {
      $total_amount = $total_amount + $amount[$i];
  }
  $sale = "tax";
  // dd($request->all());
               DB::insert("insert into sale (sti,sale,customer_name,account_type,sale_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('sti'),$sale,$request->input('customer_name'),$request->input('account_type'),$request->input('sale_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
               $result = DB::select("select* from sale order by pk_id DESC");
               for($i = 0;  $i < $wordCount ; $i++)
               {
                  DB::insert("insert into detail_tax_sale (sale_id,sku,item_name,quantity,rate,tax,tax_amount,amount) values (?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$tax[$i],$tax_amount[$i],$amount[$i]));
                  $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                  if(count($inventory)>0)
                  {
                      $stock = $inventory[0]->stock + $quantity[$i];
                      DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                  }
        
              
                  if($request->input('account_type') == "credit")
                  {
                      $account = DB::select("select* from account where account_type = 'Sales Retail'");
                      if(count($account)>0)
                      {
                          $c_balance = $account[0]->decrease + $total_amount; 
                          $c_balance_bal = $account[0]->balance - $total_amount; 
                          DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance_bal]);
                          DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['decrease' =>$c_balance]);
                      }
                      else{
                  
                          DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
                     
                          }
                  
                  
                   
                  
                      $accountss = DB::select("select* from account where account_type = 'Account Receivable'");
                       
                      if(count($accountss)>0)
                      {
                          $c_balance = $accountss[0]->decrease + $total_amount; 
                          $c_balance_bal = $accountss[0]->balance - $total_amount; 
                          DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['decrease' =>$c_balance]);
                          DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['balance' =>$c_balance_bal]);
                      }
                  
                  
                    }
              
              
              
                }
}

                

             return redirect('/admin/home/view/sale/by/customer');
            
}   


/////////////////////
public function add_purchase_tax_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}
$inventory = DB::select("select* from inventory");
$result = DB::select("select * from supplier");
$sale = DB::select("select * from purchase ORDER BY pk_id DESC");

$account_type  = DB::table('account')->where('account_type','Cash On Hand')->orwhere('account_type','Bank Account')->get();
if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}

if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}


     return view('admin.add_purchase_tax_view',compact('result','sale_id','inventory','account_type'));
    }


public function add_purchase_tax(Request $request) {
if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}
$purchase_type = $request->input('purchase_type');
if($purchase_type=="purchase")
{
$total_amount = 0;
$sku = $request->input('sku');
$wordCount = count($sku);
$item_name = $request->input('item_name');
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$tax = $request->input('tax');
$tax_amount = $request->input('tax_amount');
$amount = $request->input('amount');
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + $amount[$i];
}
$purchase = "tax";
// dd($request->all());
             DB::insert("insert into purchase (sti,purchase,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('sti'),$purchase,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
             $result = DB::select("select* from purchase order by pk_id DESC");




             for($i = 0;  $i < $wordCount ; $i++)
             {
                DB::insert("insert into detail_tax_purchase (purchase_id,sku,item_name,quantity,rate,tax,tax_amount,amount,purchase_type) values (?,?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$tax[$i],$tax_amount[$i],$amount[$i],$purchase_type));
            
                $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                if(count($inventory)>0)
                {
                    $stock = $inventory[0]->stock + $quantity[$i];
                    DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                }

                if($request->input('account_type') == "credit")
                {
                    $account = DB::select("select* from account where account_type = 'Account Payable'");
                    if(count($account)>0)
                    {
                        $c_balance = $account[0]->balance + $total_amount; 
                        $c_balance_inc = $account[0]->increase + $total_amount; 
                        DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                        DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance_inc]);
              
                    }
                    else{
    
                        DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Payable','Account Payable','Account Payable',$total_amount,NOW()));
                   
                        }
                }
            
              }
            }
            elseif($purchase_type=="return")

{
  $total_amount = 0;
  $sku = $request->input('sku');
  $wordCount = count($sku);
  $item_name = $request->input('item_name');
  $rate = $request->input('rate');
  $quantity = $request->input('quantity');
  $tax = $request->input('tax');
  $tax_amount = $request->input('tax_amount');
  $amount = $request->input('amount');
  $i = 0;
  for($i = 0;  $i < $wordCount ; $i++)
  {
      $total_amount = $total_amount + $amount[$i];
  }
  $purchase = "tax";
  // dd($request->all());
               DB::insert("insert into purchase (sti,purchase,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?,?)",array($request->input('sti'),$purchase,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
               $result = DB::select("select* from purchase order by pk_id DESC");
  
  
  
  
               for($i = 0;  $i < $wordCount ; $i++)
               {
                  DB::insert("insert into detail_tax_purchase (purchase_id,sku,item_name,quantity,rate,tax,tax_amount,amount,purchase_type) values (?,?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$tax[$i],$tax_amount[$i],$amount[$i],$purchase_type));
              
                  $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                  if(count($inventory)>0)
                  {
                      $stock = $inventory[0]->stock - $quantity[$i];
                      DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                  }
  
                  if($request->input('account_type') == "credit")
                  {
                      $account = DB::select("select* from account where account_type = 'Account Payable'");
                      if(count($account)>0)
                      {
                          $c_balance = $account[0]->balance - $total_amount; 
                          $c_balance_inc = $account[0]->increase - $total_amount; 
                          DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                          DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance_inc]);
                
                      }
                      else{
      
                          DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Payable','Account Payable','Account Payable',$total_amount,NOW()));
                     
                          }
                  }
              
                }
}
            return redirect('/admin/home/view/purchase/by/supplier');
            
}   




 function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('inventory')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#" class="form-control" style="border-bottom-right-radius: 18px; border-top-left-radius: 18px;">'.$row->name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }




 function fetchsupplier(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('supplier')
        ->where('supplier_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#" class="form-control" style="border-bottom-right-radius: 18px; border-top-left-radius: 18px;">'.$row->supplier_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



 function fetchcustomer(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('customer')
        ->where('customer_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#" class="form-control" style="border-bottom-right-radius: 18px; border-top-left-radius: 18px;">'.$row->customer_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



///////////////////
public function add_purchase_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}
$inventory = DB::select("select* from inventory");
$result = DB::select("select * from supplier");
$sale = DB::select("select * from purchase ORDER BY pk_id DESC");
// $account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
$account_type  = DB::table('account')->where('account_type','Cash On Hand')->orwhere('account_type','Bank Account')->get();
if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}


     return view('admin.add_purchase_view',compact('result','sale_id','inventory','account_type'));
    }

    public function add_purchase(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}
if($request->input('account_type') == "cash")
{
    $account = DB::select("select* from account where account_type = 'Cash On Hand'");
    if(empty($account))
    {
        return Redirect::back()->withErrors('Cash On Hand Account Not Exist');
      
    }

}
$purchase_type=$request->input('purchase_type');
if($purchase_type == "purchase")
{
return "puchase";
$total_amount = 0;
$sku = $request->input('sku');
$wordCount = count($sku);
$item_name = $request->input('item_name');
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}
$purchase = "kachi parchi";
             DB::insert("insert into purchase (bill_date,purchase,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount,created_at) values (?,?,?,?,?,?,?,?,?)",array($request->input('date'),$purchase,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount,$request->input('date')));
             $result = DB::select("select* from purchase order by pk_id DESC");




             for($i = 0;  $i < $wordCount ; $i++)
             {
                 $amount = $quantity[$i] * $rate[$i];
                DB::insert("insert into detail_purchase (purchase_id,sku,item_name,quantity,rate,amount,purchase_type) values (?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount,$purchase_type));
                $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                if(count($inventory)>0)
                {
                    $stock = $inventory[0]->stock + $quantity[$i];
                    DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                }

                if($request->input('account_type') == "credit")
                {
                    $account = DB::select("select* from account where account_type = 'Account Payable'");
                    if(count($account)>0)
                    {
                        $c_balance = $account[0]->balance + $amount; 
                        DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
              
                    }
                    else{
    
                        DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Payable','Account Payable','Account Payable',$total_amount,NOW()));
                   
                        }
                }

           
            
            }

          }
           
          elseif($purchase_type == "return")
          {

            $total_amount = 0;
            $sku = $request->input('sku');
            $wordCount = count($sku);
            $item_name = $request->input('item_name');
            $rate = $request->input('rate');
            $quantity = $request->input('quantity');
            $i = 0;
            for($i = 0;  $i < $wordCount ; $i++)
            {
                $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
            }
            $purchase = "kachi parchi";
                         DB::insert("insert into purchase (bill_date,purchase,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount,created_at) values (?,?,?,?,?,?,?,?,?)",array($request->input('date'),$purchase,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount,$request->input('date')));
                         $result = DB::select("select* from purchase order by pk_id DESC");
            
            
            
            
                         for($i = 0;  $i < $wordCount ; $i++)
                         {
                             $amount = $quantity[$i] * $rate[$i];
                             
                            DB::insert("insert into detail_purchase (purchase_id,sku,item_name,quantity,rate,amount,purchase_type) values (?,?,?,?,?,?,?)",array($result[0]->pk_id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount,$purchase_type));
                            $inventory = DB::select("select * from inventory where sku = '$sku[$i]'");
                            if(count($inventory)>0)
                            {
                                $stock = $inventory[0]->stock - $quantity[$i];
                                DB::table('inventory')->where('sku', $sku[$i])->update(['stock' =>$stock]);
                            }
            
                            // if($request->input('account_type') == "credit")
                            // {
                            //     $account = DB::select("select* from account where account_type = 'Account Payable'");
                            //     if(count($account)>0)
                            //     {
                            //         $c_balance = $account[0]->balance + $amount; 
                            //         DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                          
                            //     }
                            //     else{
                
                            //         DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Payable','Account Payable','Account Payable',$total_amount,NOW()));
                               
                            //         }
                            // }
            
                   
                        
                        }


          }
            
             return redirect('/admin/home/view/purchase/by/supplier');
            
}
public function purchase_list_view($id) {
if(!(session()->has('type') && session()->get('type')=='admin'))
{
  return redirect('/admin');
}
$result1 = DB::select("select* from supplier where pk_id = '$id'");

  $result = DB::select("select* from purchase where supplier_name = '$id' and purchase_type = 'purchase'");
  $total_amount = DB::select("select SUM(total_amount) from purchase where supplier_name = '$id' and purchase_type = 'purchase'");

  return view('admin.view_purchase_list',compact('result','result1','total_amount'));

}

public function purchase_return_list_view($id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    $result1 = DB::select("select* from supplier where pk_id = '$id'");
    
      $result = DB::select("select* from purchase where supplier_name = '$id' and purchase_type = 'purchase return'");
      $total_amount = DB::select("select SUM(total_amount) from purchase where supplier_name = '$id' and purchase_type = 'purchase return'");
    
      return view('admin.view_purchase_return_list',compact('result','result1','total_amount'));
    
    }

public function purchase_detail_view($id,$purchase) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
 if($purchase == "tax")
 {
    $result = DB::select("select* from detail_tax_purchase where purchase_id = '$id'");
 }
 else{
      $result = DB::select("select* from detail_purchase where purchase_id = '$id'");
 }
      $result1 = DB::select("select* from purchase where pk_id = '$id'");
      $supplier = $result1[0]->supplier_name;
      $supplier = DB::select("select* from supplier where pk_id = '$supplier'");
      return view('admin.purchase_detail_view',compact('result','result1','supplier','purchase'));
    
    }

    public function purchase_return_detail_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
     
          $result = DB::select("select* from detail_purchase where purchase_id = '$id'");
          $result1 = DB::select("select* from purchase where pk_id = '$id'");
          $supplier = $result1[0]->supplier_name;
          $supplier = DB::select("select* from supplier where pk_id = '$supplier'");
          return view('admin.purchase_return_detail_view',compact('result','result1','supplier'));
        
        }
public function purchase_by_supplier_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type = 'purchase'");
    // dd($total_amount);
      $result = DB::select("select* from supplier");
    
      return view('admin.purchase_by_supplier_list_view',compact('result','total_amount'));
    
    }

    public function purchase_return_by_supplier_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type = 'purchase return'");
                  
          $result = DB::select("select* from supplier");
        
          return view('admin.purchase_return_by_supplier_list_view',compact('result','total_amount'));
        
        }
public function edit_purchase_view($id) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $result1 = DB::select("select* from purchase where pk_id = '$id'");
  $supplier = $result1[0]->supplier_name;
  $supplier = DB::select("select* from supplier");
  $inventory = DB::select("select* from inventory");
  $result = DB::select("select* from detail_purchase where purchase_id = '$id'");

  return view('admin.edit_purchase_view',compact('result','result1','supplier','inventory'));

}


public function edit_purchase(Request $request, $id) {
if(!(session()->has('type') && session()->get('type')=='admin'))
  {
      return redirect('/admin');
  }

  $total_amount = 0;
$sku = $request->input('sku');
$wordCount = count($sku);
$item_name = $request->input('item_name');
$rate = $request->input('rate');
$quantity = $request->input('quantity');
$i = 0;
for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
}
DB::table('purchase')->where('pk_id', $id)->update(['supplier_name' =>$request->input('supplier_name'),'account_type' =>$request->input('account_type'),'purchase_type' =>$request->input('purchase_type'),'company_name' =>$request->input('company_name'),'vehicle_no'=>$request->input('vehicle_no'),'total_amount' =>$total_amount]);
 
    DB::delete("delete from detail_purchase where purchase_id = '$id'");
             for($i = 0;  $i < $wordCount ; $i++)
             {
                 $amount = $quantity[$i] * $rate[$i];
                DB::insert("insert into detail_purchase (purchase_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?)",array($id,$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
             }


 return redirect('/admin/home/view/purchase/by/supplier');

}

public function delete_purchase($id) {

if(!(session()->has('type') && session()->get('type')=='admin'))
{
    return redirect('/admin');
}

DB::delete("delete from purchase where pk_id = '$id'");

DB::delete("delete from detail_purchase where purchase_id = '$id'");
return redirect()->back();
}

public function purchase_by_item_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    $total_amount = DB::select("select SUM(amount) from detail_purchase");
      $result = DB::select("select* from inventory");
      return view('admin.purchase_by_item_list_view',compact('result','total_amount'));
    
    }
    public function purchase_detail_by_item_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $result = DB::select("select* from detail_purchase,purchase where detail_purchase.sku = '$id' and detail_purchase.purchase_id = purchase.pk_id");
      
        $total_amount = DB::select("select SUM(amount) from detail_purchase where sku = '$id'");
          return view('admin.purchase_detail_by_item_view',compact('total_amount','result'));
        
        }

        public function purchase_by_invoice_list_view() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            $total_amount = DB::select("select SUM(total_amount) from purchase");
              $result = DB::select("select* from purchase");
              $result1 = DB::select("select* from supplier");
              // return $result[0]->supplier_name;
              return view('admin.purchase_by_invoice_list_views',compact('result','result1','total_amount'));
            
            }


            public function search_purchase_by_invoice_list_view_date(Request $request) {
    
              if(!(session()->has('type') && session()->get('type')=='admin'))
              {
                  return redirect('/admin');
              }

            $date_from =  $request->input('date_from');
            $date_to =  $request->input('date_to');
 
   $result = "Select* from purchase where ";
  
              // $result = "Select* from expense where ";
              $check = 0;

            if($request->input('date_from'))
            {
              if($check==1)
              {
                          $result .= "and created_at BETWEEN '$date_from' AND '$date_to' ";
              }
              else{
                  $result .= "created_at BETWEEN '$date_from' AND '$date_to' ";
                  $check = 1;
              }
              }
              
             
  
              $total_amount = DB::select("select SUM(total_amount) from purchase where created_at BETWEEN '$date_from' AND '$date_to'  ");
              // $result = DB::select("select* from sale");
              $result1 = DB::select("select* from supplier");
              // return $result[0]->supplier_name;


              $result = DB::select("$result");
             
              return view('admin.purchase_by_invoice_list_views',compact('result','total_amount','result1'));
          
              
   
                   }


                   public function purchase_by_invoice_list_view_supplier(Request $request) {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
                    $name= $request->input('supplier_name');
                   
                    $total_amount = DB::select("select SUM(total_amount) from purchase where supplier_name= '$name'");
                    // return $total_amount;
                      $result = DB::select("select* from purchase where supplier_name= '$name'");
                      // return $result ;
                      $result1 = DB::select("select* from supplier");
                      return view('admin.purchase_by_invoice_list_views',compact('result','total_amount','result1'));
                    
                    }






            public function sale_by_invoice_list_view() {
              if(!(session()->has('type') && session()->get('type')=='admin'))
              {
                return redirect('/admin');
              }

            


              $total_amount = DB::select("select SUM(total_amount) from sale");
                $result = DB::select("select* from sale");
                $result1 = DB::select("select* from customer");
                // return $result;


                return view('admin.sale_by_invoice_list_views',compact('result','total_amount','result1'));
              
              }
              public function expense_report() {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
  
              
  
  
                $total_amount = DB::select("select SUM(amount) from expense");
                  $result = DB::select("select* from expense");
                  // return $result;
                  $result1 = DB::select("select* from customer");
                  // return $result;
  
  
                  return view('admin.expense_report',compact('result','total_amount','result1'));
                
                }



                public function expense_report_print() {
                  if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                    return redirect('/admin');
                  }
    
                
    
    
                  $total_amount = DB::select("select SUM(amount) from expense");
                    $result = DB::select("select* from expense");
                    $result1 = DB::select("select* from customer");
                    // return $result;
    
    
                    return view('admin.expense_report_print',compact('result','total_amount','result1'));
                  
                  }
  

              public function print_page() {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
  
              
  
  
                $total_amount = DB::select("select SUM(total_amount) from sale");
                  $result = DB::select("select* from sale");
                  $result1 = DB::select("select* from customer");
                  // return $result[0]->supplier_name;
  
  
                  return view('admin.printpage',compact('result','total_amount','result1'));
                
                }
                

                public function pdf_sale_by_customer() {
                  if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                    return redirect('/admin');
                  }
    
                  $total_amount = DB::select("select SUM(total_amount) from sale");
                    $result = DB::select("select* from sale");
                    $result1 = DB::select("select* from customer");
                    // return $result[0]->supplier_name;
                    // return view('admin.pdf_sale_by_customer',compact('result','total_amount','result1'));
                    $pdf = PDF::loadView('admin.pdf_sale_by_customer', compact('result','total_amount','result1'));
                   
                    return $pdf->download('test.pdf');

                    // return view('admin.printpage',compact('result','total_amount','result1'));
                  
                  }




                  public function csv_export() 
                  {

                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
      

                      return Excel::download(new UsersExport, 'users.xlsx');
                  }
                 










              public function search_sale_by_invoice_list_view_date(Request $request) {
    
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
 
              $date_from =  $request->input('date_from');
              $date_to =  $request->input('date_to');
              $tax_sale =  $request->input('tax_sale');
  //  return $tax_sale;
     $result = "Select* from sale where ";
    
                // $result = "Select* from expense where ";
                $check = 0;

              if($request->input('date_from'))
              {
                if($check==1)
                {
                            $result .= "and created_at BETWEEN '$date_from' AND '$date_to' ";
                }
                else{
                    $result .= "created_at BETWEEN '$date_from' AND '$date_to' ";
                    $check = 1;
                }
                }
                
                
              if($request->input('tax_sale'))
              {
                if($check==1)
                {
                  return "ads";
                  $result .= "created_at BETWEEN '$date_from' AND '$date_to' ";
                }
                else{
                    $result .= "created_at BETWEEN '$date_from' AND '$date_to' ";
                    $check = 1;
                }
                }
               
    
                $total_amount = DB::select("select SUM(total_amount) from sale  where created_at BETWEEN '$date_from' AND '$date_to' ");
                // $result = DB::select("select* from sale");
                $result1 = DB::select("select* from customer");
                // return $result[0]->supplier_name;


                $result = DB::select("$result");
               
                return view('admin.sale_by_invoice_list_views',compact('result','total_amount','result1'));
            
                
     
                     }
              
    



              public function sale_by_invoice_list_view_customer(Request $request) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
                $name= $request->input('customer_name');
               
                $total_amount = DB::select("select SUM(total_amount) from sale where customer_name= '$name'");
                // return $total_amount;
                  $result = DB::select("select* from sale where customer_name= '$name'");
                  // return $result ;
                  $result1 = DB::select("select* from customer");
                  return view('admin.sale_by_invoice_list_views',compact('result','total_amount','result1'));
                
                }



            public function purchase_detail_by_invoice_view($id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
                $result1 = DB::select("select* from purchase where pk_id = '$id'");
                $supplier = $result1[0]->supplier_name; 
                $supplier = DB::select("select* from supplier where pk_id = '$supplier'");
                $result = DB::select("select* from detail_purchase where purchase_id = '$id'");
           return view('admin.purchase_detail_by_invoice_view',compact('result','result1','supplier'));
                
                }


                public function sale_detail_by_invoice_view($id) {
                  if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                    return redirect('/admin');
                  }
                  $result1 = DB::select("select* from sale where pk_id = '$id'");
                  $customer = $result1[0]->customer_name; 
                  $customer = DB::select("select* from customer where pk_id = '$customer'");
                  $result = DB::select("select* from detail_sale where sale_id = '$id'");
             return view('admin.sale_detail_by_invoice_view',compact('result','result1','customer'));
                  
                  }
               
               
 ///////////////////////

 public function pump_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
    $result = DB::select("select* from pump where status = '0'");
      return view('admin.pump_list_view',compact('result'));
    
    }

    public function add_pump_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
    {
     return redirect('/admin');
    }
    
         return view('admin.add_pump_view');
        }
        public function add_pump(Request $request) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
    {
       return redirect('/admin');
    }
    $total_amount = 0;
    $pump_name = $request->input('pump_name');
    
    
   
    $tank_name = $request->input('tank_name');
    $total_capacity = $request->input('total_capacity');
    $total_dip = $request->input('total_dip');
    $opening_stock = $request->input('opening_stock');
    $uom = $request->input('uom');
    $opening_balance = $request->input('opening_balance');
    $opening_dip = $request->input('opening_dip');
    
    $wordCount = count($tank_name);
    
                 DB::insert("insert into pump (pump_name,pump_address) values (?,?)",array($request->input('pump_name'),$request->input('pump_address')));
                 $result = DB::select("select* from pump where pump_name = '$pump_name' order by pk_id DESC");
                if(count($result)>0)
                {
                 $pump_id = $result[0]->pk_id;
                 for($i = 0;  $i < $wordCount ; $i++)
                 {
                    DB::insert("insert into tank (pump_id,tank_name,total_capacity,total_dip,opening_stock,uom,opening_balance,opening_dip) values (?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$tank_name[$i],$total_capacity[$i],$total_dip[$i],$opening_stock[$i],$uom[$i],$opening_balance[$i],$opening_dip[$i]));
            
                }
            }
                 return redirect('/admin/home/view/pump');
                
    }


    public function edit_pump_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
    {
     return redirect('/admin');
    }
    $result = DB::select("select* from pump where pk_id = '$id'");
         return view('admin.edit_pump_view',compact('result'));
        }
        public function edit_pump(Request $request, $id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
    {
       return redirect('/admin');
    }
   
    DB::table('pump')->where('pk_id', $id)->update(['pump_name' =>$request->input('pump_name'),'pump_address' => $request->input('pump_address')]);
    

                 return redirect('/admin/home/view/pump');
                
    }

    public function delete_pump($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}
$status = 1;
DB::table('pump')->where('pk_id', $id)->update(['status' =>$status]);
    
return redirect()->back();

}

    /////////////////////////

    public function machine_list_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $result1 = DB::select("select* from pump where pk_id = '$id'");
        $result = DB::select("select* from machine where pump_id = '$id'");
        $result = DB::table('machine')->join('pump','pump.pk_id','=','machine.pump_id')->where('pump.pk_id',$id)->get();
        // dd($result);
        // dd($resul;;t,$result1);
        // $result = DB::table('pump')

          return view('admin.machine_list_view',compact('result','result1'));
        
        }

        public function add_machine_view($id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
        {
         return redirect('/admin');
        }
        $result = DB::select("select* from pump where pk_id = '$id'");
        $result1 = DB::select("select* from tank where pump_id = '$id'");
             return view('admin.add_machine_view',compact('result','result1','id'));
            }

            public function add_machine(Request $request,$id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
        {
           return redirect('/admin');
        }
      
        $machine_name = $request->input('machine_name');
        $closing_reading = $request->input('closing_reading');
        $rate = $request->input('rate');
        $current_dip = $request->input('current_dip');
        
        $wordCount = count($machine_name);
        
                     for($i = 0;  $i < $wordCount ; $i++)
                     {
                        DB::insert("insert into machine (pump_id,tank_id,machine_name,closing_reading,rate,current_dip) values (?,?,?,?,?,?)",array($id,$request->input('tank_name'),$machine_name[$i],$closing_reading[$i],$rate[$i],$current_dip[$i]));
                 
                    }
            
                     return redirect("/admin/home/view/machine/$id");
                    
        }
        public function machine_detail_view($id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
    {
       return redirect('/admin');
    }
    $result = DB::select("select* from machine where pk_id = '$id'");
    if(!empty($result))
    {

    $tank_id = $result[0]->tank_id;
        $result1 = DB::select("select* from tank where pk_id = '$tank_id'");
             return view('admin.machine_detail_view',compact('result','result1'));
           }
           else{
                return view('admin.machine_detail_view');
           }

    }

    public  function edit_machine_view($id) {

        
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        $result = DB::select("select* from machine where pk_id='$id'");
        $pump_id = $result[0]->pump_id;
        $result1 = DB::select("select* from pump where pk_id='$pump_id'");
        $result2 = DB::select("select* from tank");
        return view('admin.edit_machine_view',compact('result','result1','result2'));
    }
    
    public function edit_machine(Request $request,$id) {
    
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
            return redirect('/admin');
        }
        DB::table('machine')->where('pk_id', $id)->update(['tank_id' =>$request->input('tank_name'),'machine_name' => $request->input('machine_name'),'closing_reading' => $request->input('closing_reading'),'rate' => $request->input('rate'),'current_dip' => $request->input('current_dip')]);
    
    
              return redirect("admin/home/view/machine/detail/$id");
             }
             public function delete_machine($id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
        {
           return redirect('/admin');
        }
         DB::delete("delete from machine where pk_id = '$id'");
       return redirect()->back();
    
        }
             //////////////////////////

             public  function edit_tank_view($id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
                $result = DB::select("select* from tank where pk_id = '$id'");
                $pump_id = $result[0]->pump_id;
                $result1 = DB::select("select* from pump where pk_id='$pump_id'");
           
                return view('admin.edit_tank_view',compact('result','result1'));
            }
            
            public function edit_tank(Request $request,$id) {
            
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
                DB::table('tank')->where('pk_id', $id)->update(['tank_name' =>$request->input('tank_name'),'total_capacity' => $request->input('total_capacity'),'total_dip' => $request->input('total_dip'),'opening_stock' => $request->input('opening_stock'),'uom' => $request->input('uom'),'opening_balance' => $request->input('opening_balance'),'opening_dip' => $request->input('opening_dip')]);
                $result = DB::select("select* from tank where pk_id = '$id'");
                $pump_id = $result[0]->pump_id;
            
                      return redirect("admin/home/view/machine/$pump_id");
                     }

    ////////////////////////////////////////////////

    public function pump_purchase_by_supplier_list_view($pump_id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        session()->put('pump_id',$pump_id);
        $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type='purchase'");
        $pump = DB::select("select* from pump where pk_id = '$pump_id'");
          $result = DB::select("select* from supplier");
        
          return view('admin.pump_purchase_by_supplier_list_view',compact('result','total_amount','pump_id','pump'));
        
        }

        public function pump_purchase_return_by_supplier_list_view($pump_id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            session()->put('pump_id',$pump_id);
            $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type='purchase return'");
            $pump = DB::select("select* from pump where pk_id = '$pump_id'");
              $result = DB::select("select* from supplier");
            
              return view('admin.pump_purchase_return_by_supplier_list_view',compact('result','total_amount','pump_id','pump'));
            
            }
 

        public function add_pump_purchase_view($pump_id) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
        {
         return redirect('/admin');
        }
        $pump = DB::select("select* from pump where pk_id = '$pump_id'");
        $tank = DB::select("select* from tank where pump_id = '$pump_id'");
        $inventory = DB::select("select* from inventory");
        $result = DB::select("select * from supplier");
        $sale = DB::select("select * from pump_purchase ORDER BY pk_id DESC");
        if(count($sale)>0)
        {
            $sale_id = $sale[0]->pk_id + 1;
        }
        else{
            $sale_id = 1;
        }
        
        
             return view('admin.add_pump_purchase_view',compact('result','tank','sale_id','inventory','pump_id','pump'));
            }

            public function add_pump_purchase(Request $request,$pump_id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
        {
           return redirect('/admin');
        }
        $sku = $request->input('sku');
        $tank_name = $request->input('tank_name');
        $item_name = $request->input('item_name');
        $total_amount = 0;
        $wordCount = count($tank_name);
        $quantity = $request->input('quantity');
        $rate = $request->input('rate');
        $i = 0;
        for($i = 0;  $i < $wordCount ; $i++)
        {
            $total_amount = $total_amount + ($quantity[$i] * $rate[$i]);
        }
        
                     DB::insert("insert into pump_purchase (pump_id,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?)",array($pump_id,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
                     $result = DB::select("select* from pump_purchase order by pk_id DESC");
                     for($i = 0;  $i < $wordCount ; $i++)
                     {
                         $amount = $quantity[$i] * $rate[$i];
                        DB::insert("insert into pump_detail_purchase (purchase_id,tank_id,sku,item_name,quantity,rate,amount) values (?,?,?,?,?,?,?)",array($result[0]->pk_id,$tank_name[$i],$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$amount));
                     }
                    
                     return redirect("/admin/home/view/pump/purchase/by/supplier/$pump_id");
                    
        }

        public function pump_for_purchase_list_view() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            $result = DB::select("select* from pump");
              return view('admin.pump_for_purchase_list_view',compact('result'));
            
            }

            public function pump_purchase_list_view($id,$pump_id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
                $pump = DB::select("select* from pump where pk_id = '$pump_id'");
                $result1 = DB::select("select* from supplier where pk_id = '$id'");
                
                  $result = DB::select("select* from pump_purchase where supplier_name = '$id' and purchase_type = 'purchase'");
                  $total_amount = DB::select("select SUM(total_amount) from pump_purchase where supplier_name = '$id' and purchase_type = 'purchase'");
                
                  return view('admin.view_pump_purchase_list',compact('result','result1','total_amount','pump','pump_id'));
                
                }
                public function pump_purchase_return_list_view($id,$pump_id) {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
                    $pump = DB::select("select* from pump where pk_id = '$pump_id'");
                    $result1 = DB::select("select* from supplier where pk_id = '$id'");
                    
                      $result = DB::select("select* from pump_purchase where supplier_name = '$id' and purchase_type = 'purchase return'");
                      $total_amount = DB::select("select SUM(total_amount) from pump_purchase where supplier_name = '$id' and purchase_type = 'purchase return'");
                    
                      return view('admin.view_pump_purchase_return_list',compact('result','result1','total_amount','pump','pump_id'));
                    
                    }

                public function pump_purchase_detail_view($id,$purchase) {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
                    if($purchase == "tax")
                    {
                       $result = DB::select("select* from pump_detail_purchase_tax where purchase_id = '$id'");
                    }
                    else{
                         $result = DB::select("select* from pump_detail_purchase where purchase_id = '$id'");
                    }

                      $result1 = DB::select("select* from pump_purchase where pk_id = '$id' and purchase_type='purchase'");
                      $pump_id = $result1[0]->pump_id;
                      $pump = DB::select("select* from pump where pk_id = '$pump_id'");
                      $supplier = $result1[0]->supplier_name;
                      $supplier = DB::select("select* from supplier where pk_id = '$supplier'");
                      return view('admin.pump_purchase_detail_view',compact('pump','result','result1','supplier'));
                    
                    }

                    public function pump_purchase_return_detail_view($id) {
                        if(!(session()->has('type') && session()->get('type')=='admin'))
                        {
                          return redirect('/admin');
                        }
            
                          $result = DB::select("select* from pump_detail_purchase where purchase_id = '$id'");
                          $result1 = DB::select("select* from pump_purchase where pk_id = '$id' and purchase_type='purchase return'");
                          $pump_id = $result1[0]->pump_id;
                          $pump = DB::select("select* from pump where pk_id = '$pump_id'");
                          $supplier = $result1[0]->supplier_name;
                          $supplier = DB::select("select* from supplier where pk_id = '$supplier'");
                          return view('admin.pump_purchase_return_detail_view',compact('pump','result','result1','supplier'));
                        
                        }

                        public function edit_pump_purchase_view($id) {
                            if(!(session()->has('type') && session()->get('type')=='admin'))
                              {
                                  return redirect('/admin');
                              }
                            
                              $result1 = DB::select("select* from pump_purchase where pk_id = '$id'");
                              $pump_id = $result1[0]->pump_id;
                              $pump = DB::select("select* from pump where pk_id = '$pump_id'");
                              $supplier = $result1[0]->supplier_name;
                              $result = DB::select("select* from supplier");
                              $inventory = DB::select("select* from inventory");
                              $detail = DB::select("select* from pump_detail_purchase where purchase_id = '$id'");
                              $tank_id = $detail[0]->tank_id;
                              $tank = DB::select("select* from tank where pk_id = '$tank_id'");
                              return view('admin.edit_pump_purchase_view',compact('result','tank','result1','supplier','inventory','pump','id','detail'));
                            
                            }

////////////////////////////////////////////////
public function add_pump_purchase_tax_view($pump_id) {
    if(!(session()->has('type') && session()->get('type')=='admin'))
{
 return redirect('/admin');
}
$pump = DB::select("select* from pump where pk_id = '$pump_id'");
$tank = DB::select("select* from tank where pump_id = '$pump_id'");
$inventory = DB::select("select* from inventory");
$result = DB::select("select * from supplier");
$sale = DB::select("select * from pump_purchase ORDER BY pk_id DESC");
if(count($sale)>0)
{
    $sale_id = $sale[0]->pk_id + 1;
}
else{
    $sale_id = 1;
}


     return view('admin.add_pump_purchase_tax_view',compact('result','tank','sale_id','inventory','pump_id','pump'));
    }

    public function add_pump_purchase_tax(Request $request,$pump_id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
{
   return redirect('/admin');
}
$sku = $request->input('sku');
$tank_name = $request->input('tank_name');
$item_name = $request->input('item_name');
$total_amount = 0;
$wordCount = count($item_name);
$quantity = $request->input('quantity');
$rate = $request->input('rate');
$tax = $request->input('tax');
$tax_amount = $request->input('tax_amount');
$amount = $request->input('amount');
$pump_purchase = "tax";
$i = 0;

for($i = 0;  $i < $wordCount ; $i++)
{
    $total_amount = $total_amount + $amount[$i];
}

             DB::insert("insert into pump_purchase (pump_id,sti,pump_purchase,supplier_name,account_type,purchase_type,company_name,vehicle_no,total_amount) values (?,?,?,?,?,?,?,?,?)",array($pump_id,$request->input('sti'),$pump_purchase,$request->input('supplier_name'),$request->input('account_type'),$request->input('purchase_type'),$request->input('company_name'),$request->input('vehicle_no'),$total_amount));
             $result = DB::select("select* from pump_purchase order by pk_id DESC");
             for($i = 0;  $i < $wordCount ; $i++)
             {

                DB::insert("insert into pump_detail_purchase_tax (purchase_id,tank_id,sku,item_name,quantity,rate,tax,tax_amount,amount) values (?,?,?,?,?,?,?,?,?)",array($result[0]->pk_id,$tank_name[$i],$sku[$i],$item_name[$i],$quantity[$i],$rate[$i],$tax[$i],$tax_amount[$i],$amount[$i]));
             }
            
             return redirect("/admin/home/view/pump/purchase/by/supplier/$pump_id");
            
}


/////////////////////////////////////////////////
                    public function test() {
                        if(!(session()->has('type') && session()->get('type')=='admin'))
                        {
                          return redirect('/admin');
                        }
                      
                        
                          return view('admin.test');
                        
                        }
                        public function test_post(Request $request) {
                            if(!(session()->has('type') && session()->get('type')=='admin'))
                            {
                              return redirect('/admin');
                            }
                            $sku = $request->input('mytextt');
                            return $sku;
                              return view('admin.test');
                            
                            }

/////////////////////////////////////////

    public function add_account_receivable_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
        $result = DB::select("select* from customer");   
        // dd($result);              
          return view('admin.add_account_receivable_view',compact('result','account_type'));
        
        }

        public function add_account_receivable(Request $request) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }//dd($request->all());

$tst= $request->input('customer_name');
// return $tst;

            DB::insert("insert into account_receivable (customer_name,date,amount_received,receiving_method,receiving_account,acount_type_id) values (?,?,?,?,?,?)",array($request->input('customer_name'),$request->input('date'),$request->input('amount_received'),$request->input('receiving_method'),$request->input('amount_receivable'),$request->input('account_type')));           
            $result = DB::select("select* from account_receivable"); 



        $total_amount = $request->input('amount_received');


        // dd($request->all());
           $account_type_id = $request->input('account_type');

            $account = DB::select("select* from account where pk_id =".$account_type_id);
            $account_receivable = DB::select("select* from account where account_type ='Account Receivable'");
          // $account = DB::select("select* from account where account_type = 'Account Payable'");

          if(count($account)>0)
          {
            
              $c_balance = $account[0]->balance + $total_amount; 
              $account_receivable = $account_receivable[0]->balance + $total_amount; 

              DB::table('account')->where('pk_id',$account_type_id )->update(['balance' =>$c_balance]);
              DB::table('account')->where('account_type','Account Receivable' )->update(['balance' =>$account_receivable]);
    
          }
        else{

                DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
           
                }





        //   $account = DB::select("select* from account where account_type = 'Account Receivable'");

        //   if(count($account)>0)
        //   {
        //       $c_balance = $account[0]->balance + $total_amount; 
        //       DB::table('account')->where('account_type',"Account Receivable")->update(['balance' =>$c_balance]);
    
        //   }
        // else{

        //         DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
           
        //         }

            // dd($result);
            return view('admin.account_receivable_list_view',compact('result'));
            
            }
            public function select_account_receivable(Request $request)
            {
                $value = $request->Input('cat_id');
            $account_type = "credit";
            $total_amount = 0;
                $result = DB::select("select * from sale where customer_name='$value' and account_type='$account_type'"); 
               if(count($result)>0)
               {
                foreach($result as $results)
               {
            $total_amount = $total_amount + $results->total_amount;
           }
        }
           return $total_amount;
               
                    
            }
//////////////////////////////////////////////

public function add_account_payable_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }

    $account_type  = DB::table('account')->where('account_type','Cash On Hand')->get();
    $result = DB::select("select* from supplier");   
    // dd($result,$account_type);              
      return view('admin.add_account_payable_view',compact('result','account_type'));
    
    }

    public function add_account_payable(Request $request) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        // dd($request->all());
        DB::insert("insert into account_payable (supplier_name,date,amount_payed,paying_method,paying_account) values (?,?,?,?,?)",array($request->input('supplier_name'),$request->input('date'),$request->input('amount_payed'),$request->input('paying_method'),$request->input('amount_payable')));           
        $result = DB::select("select* from account_payable"); 


        $total_amount = $request->input('amount_payed');
        $account_type_id = $request->input('account_type');

            $account = DB::select("select* from account where pk_id =".$account_type_id);



              if($request->input('account_type'))
            {
              DB::enableQueryLog();
                 $account_type_id = $request->input('account_type');
                $account = DB::select("select* from account where pk_id =".$account_type_id);
                  $account_payble = DB::select("select* from account where account_type = 'Account Payable' ");
                             $query = DB::getQueryLog();
                // print_r($query);
                // dd($account, $account_type_id);
                if(count($account)>0)
                {

                    $c_balance = $account[0]->balance - $total_amount; 
                    $p_balance = $account_payble[0]->balance - $total_amount; 
                    $resultt = DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                     $resultt = DB::table('account')->where('account_type','Account Payable')->update(['balance' =>$p_balance]);

          
                }
                else{

                    DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
               
                    }
                }


          // $account = DB::select("select* from account where account_type = 'Account Payable'");

        //   if(count($account)>0)
        //   {
        //       $c_balance = $account[0]->balance + $total_amount; 
        //       DB::table('account')->where('account_type',"Account Payable")->update(['balance' =>$c_balance]);
    
        //   }
        // else{

        //         DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
           
        //         }

      // dd($resultt);
        return redirect()->route('account.payable.list');
        
        }
        public function select_account_payable(Request $request)
        {
            $value = $request->Input('cat_id');
        $account_type = "credit";
        $total_amount = 0;
            $result = DB::select("select * from purchase where supplier_name='$value' and account_type='$account_type'"); 
           if(count($result)>0)
           {
            foreach($result as $results)
           {
        $total_amount = $total_amount + $results->total_amount;
       }
    }
       return $total_amount;
           
                
        }
///////////////////////////////////////////////
public function report_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
                            
      return view('admin.report_list_view');
    
    }

    public function inventory_report() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
      {
        return redirect('/admin');
      }
      $result = DB::select("select * from inventory "); 
                            
        return view('admin.inventory_report',compact('result'));
      
      }

      public function inventory_report_print() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
        $result = DB::select("select * from inventory "); 
                              
          return view('admin.inventory_report_print',compact('result'));
        
        }


    public function profit_report_view() {
      if(!(session()->has('type') && session()->get('type')=='admin'))
      {
        return redirect('/admin');
      }
            
$sale = DB::table('detail_sale')->sum('amount');
$purchase = DB::table('purchase')->sum('total_amount');
// $expense = DB::table('expense')->sum('amount');
$expense= "0";
// return $purchase;   
$gross_profit= $sale - $purchase; 
$net_income= $gross_profit -  $expense;             
        return view('admin.profit_loss',compact('sale','purchase','gross_profit','expense','net_income'));
      
      }



      public function profit_report_print() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
              
  $sale = DB::table('detail_sale')->sum('amount');
  $purchase = DB::table('purchase')->sum('total_amount');
  // $expense = DB::table('expense')->sum('amount');
  $expense= "0";
  // return $purchase;   
  $gross_profit= $sale - $purchase; 
  $net_income= $gross_profit -  $expense;             
          return view('admin.profit_loss_print',compact('sale','purchase','gross_profit','expense','net_income'));
        
        }


      public function balance_sheet() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
              
  // $sale = DB::table('deatail_sale')->sum('total_amount');
  $asset = DB::table('account')->where('account_type','Cash on Hand')->sum('increase');

  $sale = DB::table('detail_sale')->sum('amount');
  $purchase = DB::table('purchase')->sum('total_amount');
  // $expense = DB::table('expense')->sum('amount');
  $expense= "0";
  // return $purchase;   
  $gross_profit= $sale - $purchase; 
  $net_income= $gross_profit -  $expense; 

  $AR = DB::table('account')->where('account_type','Liabilities')->sum('increase');
  $capital = DB::table('account')->where('account_type','Capital')->sum('increase');
  $AP =DB::table('detail_purchase')->sum('amount');
             
          return view('admin.balance_sheet',compact('net_income','AR','AP','asset','capital'));
        
        }


        public function balance_sheet_print() {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
                
    // $sale = DB::table('deatail_sale')->sum('total_amount');
    $asset = DB::table('account')->where('account_type','Cash on Hand')->sum('increase');
  
    $sale = DB::table('detail_sale')->sum('amount');
    $purchase = DB::table('purchase')->sum('total_amount');
    // $expense = DB::table('expense')->sum('amount');
    $expense= "0";
    // return $purchase;   
    $gross_profit= $sale - $purchase; 
    $net_income= $gross_profit -  $expense; 
  
    $AR = DB::table('account')->where('account_type','Liabilities')->sum('increase');
    $capital = DB::table('account')->where('account_type','Capital')->sum('increase');
    $AP =DB::table('detail_purchase')->sum('amount');
               
            return view('admin.balance_sheet_print',compact('net_income','AR','AP','asset','capital'));
          
          }
  




    public function account_payable_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
      
        $result = DB::select("select* from account_payable");
        $amount_payed = DB::select("select SUM(amount_payed) from account_payable");
                                
          return view('admin.account_payable_list_view',compact('result','amount_payed'));
        
        }

    public function account_receivable_list_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
      
        $result = DB::select("select* from sale where sale = 'invoice'");

        $total = DB::select("select SUM(total_amount) from sale where sale = 'invoice'  "); 
       
        // $amount_received = DB::select("select SUM(receiving_account) from account_receivable");      
        // $result2 = DB::table('sale_invoice')->where('org_amount','<=' ,'30000')->sum('org_amount');
        // $result3 = DB::select("select SUM(org_amount) from sale where  org_amount < 60000"); 
      
        // $result3 = DB::table('sale_invoice')->where('org_amount','>=' ,'30000' )->sum('org_amount');
        $result3 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount <= '30000' "); 
       
        $result4 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '30000' and total_amount <= '60000' "); 
      
        $result5 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '60000' and total_amount <= '90000' "); 
       
        $result6 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '90000' "); 
              
        // return $result3;   

          return view('admin.account_receivable',compact('total','result','result3','result4','result5','result6'));
        
        }


        public function account_receivable_list_view_print() {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
        
          $result = DB::select("select* from sale where sale = 'invoice'");
  
          $total = DB::select("select SUM(total_amount) from sale where sale = 'invoice'  "); 
         
          // $amount_received = DB::select("select SUM(receiving_account) from account_receivable");      
          // $result2 = DB::table('sale_invoice')->where('org_amount','<=' ,'30000')->sum('org_amount');
          // $result3 = DB::select("select SUM(org_amount) from sale where  org_amount < 60000"); 
        
          // $result3 = DB::table('sale_invoice')->where('org_amount','>=' ,'30000' )->sum('org_amount');
          $result3 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount <= '30000' "); 
         
          $result4 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '30000' and total_amount <= '60000' "); 
        
          $result5 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '60000' and total_amount <= '90000' "); 
         
          $result6 = DB::select("select SUM(total_amount) from sale where sale = 'invoice' and  total_amount >= '90000' "); 
                
          // return $result3;   
  
            return view('admin.account_receivable_list_view_print',compact('total','result','result3','result4','result5','result6'));
          
          }



        public function account_payable_reporting() {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
        
          $result = DB::select("select* from purchase ");
  
          $total = DB::select("select SUM(total_amount) from purchase  "); 
         
          // $amount_received = DB::select("select SUM(receiving_account) from account_receivable");      
          // $result2 = DB::table('sale_invoice')->where('org_amount','<=' ,'30000')->sum('org_amount');
          // $result3 = DB::select("select SUM(org_amount) from sale where  org_amount < 60000"); 
        
          // $result3 = DB::table('sale_invoice')->where('org_amount','>=' ,'30000' )->sum('org_amount');
          $result3 = DB::select("select SUM(total_amount) from purchase where  total_amount <= '30000' "); 
         
          $result4 = DB::select("select SUM(total_amount) from purchase where  total_amount >= '30000' and total_amount <= '60000' "); 
        
          $result5 = DB::select("select SUM(total_amount) from purchase where total_amount >= '60000' and total_amount <= '90000' "); 
         
          $result6 = DB::select("select SUM(total_amount) from purchase where   total_amount >= '90000' "); 
                
          // return $result3;   
  
            return view('admin.account_payable',compact('total','result','result3','result4','result5','result6'));
          
          }
        
        



          public function account_payable_reporting_print() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
          
            $result = DB::select("select* from purchase ");
    
            $total = DB::select("select SUM(total_amount) from purchase  "); 
           
            // $amount_received = DB::select("select SUM(receiving_account) from account_receivable");      
            // $result2 = DB::table('sale_invoice')->where('org_amount','<=' ,'30000')->sum('org_amount');
            // $result3 = DB::select("select SUM(org_amount) from sale where  org_amount < 60000"); 
          
            // $result3 = DB::table('sale_invoice')->where('org_amount','>=' ,'30000' )->sum('org_amount');
            $result3 = DB::select("select SUM(total_amount) from purchase where  total_amount <= '30000' "); 
           
            $result4 = DB::select("select SUM(total_amount) from purchase where  total_amount >= '30000' and total_amount <= '60000' "); 
          
            $result5 = DB::select("select SUM(total_amount) from purchase where total_amount >= '60000' and total_amount <= '90000' "); 
           
            $result6 = DB::select("select SUM(total_amount) from purchase where   total_amount >= '90000' "); 
                  
            // return $result3;   
    
              return view('admin.account_payable_print',compact('total','result','result3','result4','result5','result6'));
            
            }

        
                public function purchase_detailed_by_customer_name($id) {
              if(!(session()->has('type') && session()->get('type')=='admin'))
              {
                return redirect('/admin');
              }
              // return $id;
  //             if($sale == "tax")
  //  {
  //     $result = DB::select("select* from detail_tax_sale where sale_id = '$id'");
  //  }
  //  else{
        $result = DB::select("select* from detail_purchase where purchase_id = '$id'");
  //  }
// return $result;
        $result1 = DB::select("select* from purchase where supplier_name = '$id'");
        // $total_amount = DB::select("select SUM(total_amount) from sale where customer_name = '$id' ");
      
$total_amount = DB::table('purchase')->where('supplier_name',$id)->sum('total_amount');
        // $customer = $result1[0]->customer_name;
        $supplier = DB::select("select* from supplier where pk_id = '$id'");
      //  return $total_amount;
        return view('admin.view_purchase_customer',compact('total_amount','result','result1','supplier','purchase'));
              
              }


////////////////////////////////////////////////////

public function expense_list_view() {
    if(!(session()->has('type') && session()->get('type')=='admin'))
    {
      return redirect('/admin');
    }
  
    $result = DB::select("select* from expense");
                            
      return view('admin.expense_list_view',compact('result'));
    
    }
    // public function expense_report() {
    // if(!(session()->has('type') && session()->get('type')=='admin'))
    // {
    //   return redirect('/admin');
    // }
    // $data = array();
    //  $date = \Carbon\Carbon::today()->subDays(7);
    //  $data = DB::table('expense')->where('date','>=',$date)->get();
    //  $expense = DB::table('expense')->where('date','>=',$date)->sum('amount');

    //   return view('admin.expence_report',compact('expense'))->with('data',$data);
    
    // }

    public function edit_expense_view($id) {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
      $result2 = DB::select("select* from expense where pk_id ='$id'");
        $result = DB::select("select* from account where account_type='Expense'"); 
        $result1 = DB::select("select* from account where account_type='Bank Account'");                   
          return view('admin.edit_expense_view',compact('result','result1','result2'));
        
        }


    public function add_expense_view() {
        if(!(session()->has('type') && session()->get('type')=='admin'))
        {
          return redirect('/admin');
        }
      
        $result = DB::select("select* from account "); 
        $customer = DB::select("select customer_name from customer ");
        // return $customer;
        
        $supplier = DB::select("select supplier_name from supplier ");
        // dd($result);
        $result1 = DB::select("select* from account where account_type='Bank Account'");                   
          return view('admin.add_expense_view',compact('result','result1','customer', 'supplier'));
        
        }

        public function add_expense(Request $request) {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
// return "asd";
            $payee = $request->input('payee');

            $main = $request->input('main_acc');
            // return $main;
            $account_name = $request->input('account_name');
            // return $account_name;
            // $wordCount = count($account_name);
            $payment_method = $request->input('payment_method');
            // dd($payment_method);
            $payment_account = $request->input('payment_account');
            $description = $request->input('description');
            $amount = $request->input('amount');
            // dd($request->all());
            //  for($i = 0;  $i < $wordCount ; $i++)
            //  {
                DB::insert("insert into expense (payee,main_account,payment_account,payment_method,account_name,description,amount) values (?,?,?,?,?,?,?)",array($payee,$main,$payment_account,$payment_method,$account_name,$description,$amount));
            //  }




             $last_id = DB::getPdo()->lastInsertId();
             $account = DB::select("select* from expense where pk_id = '$last_id'");
            
            
            $accounts= $account[0]->account_name;
            // return $accounts;
            $account_type = DB::select("select* from account where pk_id = '$accounts'");
            $account_type= $account_type[0]->account_type;
            // return $account_type;
            $account2 = DB::select("select* from account where pk_id = '$accounts'");
            $account_balance= $account2[0]->balance;
             // $totat = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
          $totat = DB::table('expense')->sum('amount');



            
            
             // return $balance ;
             $total_amount = $request->input('amount');
             $total_amount_draw = $account_balance + $total_amount ;
             // return $account_bank;
             
           
             DB::table('account')->where('pk_id',"$accounts")->update(['balance' => $total_amount_draw]);

            
            
             // return $balance ;
             $total_amount = $request->input('amount');

             if( $account_type='Owners Equity')
             {

              $account = DB::select("select* from account where account_type = 'Capital'");
              $c_balance = $account[0]->balance - $total_amount; 
           
            DB::table('account')->where('account_name',"Owners Equity")->update(['balance' =>$c_balance]);
              
            $account = DB::select("select* from account where account_type = 'Cash on Hand'");
                               
                                if(count($account)>0)
                                {
                                    $c_balance_dec = $account[0]->decrease + $total_amount; 
                                    $c_balance = $account[0]->balance - $total_amount; 
                                    // DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['decrease' =>$c_balance_dec]);
                                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                               
                               
                                  }
                                    else{
                
                                DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
                           
                                    }
                
                                    $account = DB::select("select* from expense where pk_id = '$last_id'");
                   
                                    
                
                                    $accounts= $account[0]->account_name;
                                   
                                    $accountss = DB::select("select* from account where pk_id = '$accounts'");
                                 
                                    if(count($accountss)>0)
                                    {
                                        $c_balance = $accountss[0]->decrease + $total_amount; 
                
                                        DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['decrease' =>$c_balance]);
                              
                                    }
                        




             }

               // return $account;
                  
                    // return $c_balance;
                    // $total_invest = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
                   // $heelo = json_encode( $total_invest);
                   //  return $heelo;
                   //  $total_balance = $total_invest[0]->amount + $total_amount; 

                   //  return $total_balance;
                  //  $bank_account= $request->input('bank_account');
                   // return $account_bank;
                  //  $accountss = DB::select("select* from account where account_name ='$account_bank'   ");
                   // return $accountss;
                   // $accountss[0]->account_name
                        // $c_balanceee = $accountss[0]->balance + $total_amount; 
                       //  return $c_balance;
                        // $total_investss = DB::select("select SUM(amount) from bank_deposit where account = '$bank_account'");
                      



                 
                 // $c_balance = $account[0]->balance + $total_amount; 
                     
                    //  DB::table('account')->where('pk_id',"$bank_account")->update(['balance' => $totat]);
                    //  DB::table('account')->where('account_name',"$bank_account")->update(['balance' =>$c_balanceee]);
               






else{

  $account = DB::select("select* from account where account_type = 'Expense'");
  if(count($account)>0)
  {
      $c_balance = $account[0]->increase + $total_amount; 
      DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
      DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
  }
  else{

      DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Account Receivable','Account Receivable','Account Receivable',$total_amount,NOW()));
 
      }



  $accountss = DB::select("select* from account where account_type = 'Cash On Hand'");
   
  if(count($accountss)>0)
  {
   // $c_balance_inc = $accountss[0]->increase - $total_amount;
      $c_balance_dec = $accountss[0]->decrease + $total_amount; 

     //  DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance_inc]);
      DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['decrease' =>$c_balance_dec]);

  }






}








          //      $account = DB::select("select* from account where account_type = 'Expense'");
          //      // return $account;
          //           $c_balance_inc = $account[0]->increase + $total_amount; 
          //           $c_balance = $account[0]->balance + $total_amount;
          //          //  return $c_balance;
          //           // $total_invest = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
          //          // $heelo = json_encode( $total_invest);
          //          //  return $heelo;
          //          //  $total_balance = $total_invest[0]->amount + $total_amount; 

          //          //  return $total_balance;

                 
          //        // $c_balance = $account[0]->balance + $total_amount; 
          //            DB::table('account')->where('pk_id',"$accounts")->update(['balance' => $c_balance]);
                     
          //            DB::table('account')->where('pk_id',"$accounts")->update(['increase' => $c_balance_inc]);
          //           //  DB::table('account')->where('account_name',"Owners Equity")->update(['balance' =>$c_balance]);
               






          // //  if(isset($payment_method[0]) && $payment_method[0] == "cash")
          // //   {
          //       $account = DB::select("select* from account where account_type = 'Cash On Hand'");
          //       // $expence_account = DB::select("select* from account where account_type = 'Expense'");
               
          //       if(count($account)>0)
          //       {
          //         $c_balance = $account[0]->increase - $amount;
          //           // $c_balance = $account[0]->balance - $amount[0]; 
          //           // $expence_balance = $expence_account[0]->balance + $amount[0]; 

          //           DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
          //           // DB::table('account')->where('pk_id',$expence_account[0]->pk_id)->update(['balance' =>$expence_balance]);
          
          //       }
          //           else{

          //       DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
           
          //           }
        // }
        //   if(isset($payment_method[0]) && $payment_method[0]== "bank")
        //     {
        //       dd('aaa');
        //         $account = DB::select("select* from account where account_type = 'Bank Account'");
        //         $expence_account = DB::select("select* from account where account_type = 'Expense'");
        //         if(count($account)>0)
        //         {
        //             $c_balance = $account[0]->balance - $amount[0]; 
        //             $expence_balance = $expence_account[0]->balance - $amount[0];     
        //             DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
        //             DB::table('account')->where('pk_id',$expence_account[0]->pk_id)->update(['balance' =>$c_balance]);
          
        //         }
        //             else{

        //         DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
           
        //             }
        // }


           $result = DB::select("select* from expense"); 
            return view('admin.expense_list_view',compact('result'))->withErrors('PKR' . $total_amount . ' is successfully Credit');;
            
      }

            public function edit_expense(Request $request,$id) {
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                  return redirect('/admin');
                }
    $date = NOW();
                DB::table('expense')->where('pk_id', $id)->update(['payee' =>$request->input('payee'),'account_name' => $request->input('account_name'),'payment_method' => $request->input('payment_method'),'payment_account' => $request->input('payment_account'),'description' => $request->input('description'),'amount' => $request->input('amount'),'date'=>$date]);


                return redirect('/admin/home/view/expense');
                
                }

         public function search_purchase(Request $request) {
    
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
           
        //   $purchase_from =  $request->input('purchase_from');
        //   $purchase_to =  $request->input('purchase_to');

        //   $d_invoice_from =  $request->input('d_invoice_from');
        //   $d_invoice_to =  $request->input('d_invoice_to');

          $current_balance_from =  $request->input('current_balance_from');
          $current_balance_to =  $request->input('current_balance_to');
           $total_amount = DB::select("select SUM(total_amount) from purchase where purchase_type = 'purchase'");
           
           
          
               $total_q1 = DB::select("select SUM(quantity) from detail_purchase,purchase where detail_purchase.purchase_id = purchase.pk_id  and purchase.purchase_type = 'purchase'");
                $total_q2 = DB::select("select SUM(quantity) from detail_tax_purchase,purchase where detail_tax_purchase.purchase_id = purchase.pk_id  and purchase.purchase_type = 'purchase'");
             
                $total_purchase = $total_q1[0]->{'SUM(quantity)'} + $total_q2[0]->{'SUM(quantity)'};
              
      $result = "Select* from supplier where ";
       
            $check = 0;
          
            
            if($request->input('current_balance_from'))
            {
                if($check==1)
                {
                          $result .= "and current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
            }
            else{
                $result .= "current_balance BETWEEN '$current_balance_from' AND '$current_balance_to' ";
                $check = 1;
            }
        }
        
         if($request->input('purchase'))
            {
                if($check==1)
                {
                          $result .= "and $total_purchase BETWEEN '$purchase_from' AND '$purchase_to' ";
            }
            else{
                $result .= "$total_purchase BETWEEN '$purchase_from' AND '$purchase_to' ";
                $check = 1;
            }
        }
        
        

          $result = DB::select("$result");
          
          
            return view('admin.purchase_by_supplier_list_view',compact('result','total_amount','total_purchase'));
         
                 }
                 
                  public function search_sale(Request $request) {
    
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
                
            }
            
            $check= 0;
            
             $total_amount = DB::select("select SUM(total_amount) from sale where sale_type = 'sale'");
              $result = DB::select("select* from customer");
            
            $date_from =  $request->input('date_from');
              $date_to =  $request->input('date_to');
              $tax_sale =  $request->input('tax_sale');
              //  return $tax_sale;



$result = "Select* from sale where ";
        
             
          
          
            if($request->input('date_from'))
          {
            
           $result .= "created_at BETWEEN '$date_from' AND '$date_to' ";
                        
         
            }
      
          
            $result1 = DB::select("$result");

            if(($request->input('tax_sale'))>0)
            {
              return "ads";
              if($check=1)
              {
                return "ads";
                $result1 = DB::select("select* from sale where sale = 'tax'");
          
                
      $total_amount = DB::select("select SUM(total_amount) from sale ");
      $item_name = DB::select("select* from sale,detail_tax_sale where detail_tax_sale.sale_id = sale.pk_id  "); 
     
      $cus_name = DB::select("select customer_name from sale,detail_sale where detail_sale.sale_id = sale.pk_id  and sale.sale='tax' "); 
      
      // return $item_name;
      
        $result = DB::select("select* from customer");
       
      
        return view('admin.all_sale',compact('result1','result','total_amount','item_name','cus_name'));


              }
           
              }

              $total_amount = DB::select("select SUM(total_amount) from sale ");
             
              $item_name = DB::select("select* from sale,detail_sale where detail_sale.sale_id = sale.pk_id and created_at BETWEEN '$date_from' AND '$date_to' "); 
              $cus_name = DB::select("select customer_name from sale,detail_sale where detail_sale.sale_id = sale.pk_id  and sale.sale='tax' "); 
             
          
            return view('admin.all_sale',compact('result1','result','total_amount','item_name','cus_name'));
            
            
                  }
                 
                 public function search_expense(Request $request) {
    
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
                return redirect('/admin');
            }
           
          $id_from =  $request->input('id_from');
          $id_to =  $request->input('id_to');

          $date_from =  $request->input('date_from');
          $date_to =  $request->input('date_to');


          $amount_from =  $request->input('amount_from');
          $amount_to =  $request->input('amount_to');


 $result = "Select* from expense where ";

            // $result = "Select* from expense where ";
            $check = 0;
          if($request->input('id_from'))
          {
                        $result .= "pk_id BETWEEN '$id_from' AND '$id_to' ";
                        $check = 1;
          }

          if($request->input('date_from'))
          {
            if($check==1)
            {
                        $result .= "and date BETWEEN '$date_from' AND '$date_to' ";
            }
            else{
                $result .= "date BETWEEN '$date_from' AND '$date_to' ";
                $check = 1;
            }
            }
            if($request->input('amount_from'))
            {
                if($check==1)
            {
                          $result .= "and amount BETWEEN '$amount_from' AND '$amount_to' ";
            }
            else{
                $result .= "amount BETWEEN '$amount_from' AND '$amount_to' ";
                $check = 1;
            }

        }
            

          $result = DB::select("$result");
            return view('admin.expense_list_view',compact('result'));
         
                 }
          


                 public  function add_bank_deposit_view() {

       
                  if(!(session()->has('type') && session()->get('type')=='admin'))
                  {
                      return redirect('/admin');
                  }
      
                  $result = DB::select("select* from account where account_type = 'Cash and Cash Equivalents' ");
                  $sub_account = DB::select("select* from account where sub_account != 'NULL' ");

                  $result1 = DB::select("select* from customer");
      
                  return view('admin.create_bank_deposit',compact('result','result1','sub_account'));
              }

              public  function add_bank_deposit(Request $request) {

       
                if(!(session()->has('type') && session()->get('type')=='admin'))
                {
                    return redirect('/admin');
                }
                    
                $main="Owners Equity";
                $sub= $request->input('account_type');
                $bank_account= $request->input('bank_account');
// return $account_name;

$owner = "Owners Equity";

                  if(!empty($request->input('date')))
                  {
                    $date = $request->input('date');
                  }
                  else
                  {
                     $date = date('Y:m:d'); 
                  }
// $hell=$request->input('amount') ;
// return $hell;

                  // if($request->input('account_name')>0)
                  // {

                    // // dd($request->input('customer_name'),date('Y:m:y H:i:s'),$request->input('current_balance'));
                     DB::insert("insert into bank_deposit(account,recive_from,main_account,account_type,description,payment_method,amount) 
                      values (?,?,?,?,?,?,?)",
                      array( $request->input('bank_account'), $request->input('recive_from'),$main, $sub,
                     
                      $request->input('description') ,$request->input('method'),$request->input('amount')));

                      // DB::table('account')->where('account_name',"owner investment")->update(['investment' =>$request->input('amount')]);
                    //   DB::table('account')->where('account_name',"owner investment")->update(['balance' =>$request->input('amount')]);
                    //   DB::table('account')->where('account_name',"Owner Equity")->update(['balance' =>$request->input('amount')]);
                    // // return "hello";
                    // }
                    // $new = $heloo[0]->pk_id;
                     
                    $last_id = DB::getPdo()->lastInsertId();
                    $account = DB::select("select* from bank_deposit where pk_id = '$last_id'");
                   
                   $accounts= $account[0]->account_type;
                   $account_bank= $account[0]->account;
                    // return $account_bank;
                    
                    // $totat = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
                 $totat = DB::table('bank_deposit')->sum('amount');


                    // $data =DB::table('select SUM(amount) from bank_deposit')
                    // ->where('account_type', $accounts)
                    // ->amount;
                 
                    // $jama =  $totat[0]->amount;


                   
                   
                    // return $balance ;
                    $total_amount = $request->input('amount');
    
    
                      $account = DB::select("select* from account where account_type = 'Owners Equity'");
                      // return $account;
                           $c_balance = $account[0]->balance + $total_amount; 
                          //  return $c_balance;
                           $total_invest = DB::select("select SUM(amount) from bank_deposit where account_type = '$accounts'");
                          // $heelo = json_encode( $total_invest);
                          //  return $heelo;
                          //  $total_balance = $total_invest[0]->amount + $total_amount; 
   
                          //  return $total_balance;
                          $bank_account= $request->input('bank_account');
                          // return $account_bank;
                          $accountss = DB::select("select* from account where account_name ='$account_bank'   ");
                          // return $accountss;
                          // $accountss[0]->account_name
                               $c_balanceee = $accountss[0]->balance + $total_amount; 
                              //  return $c_balance;
                               $total_investss = DB::select("select SUM(amount) from bank_deposit where account = '$bank_account'");
                             



                        
                        // $c_balance = $account[0]->balance + $total_amount; 
                            DB::table('account')->where('pk_id',"$accounts")->update(['balance' => $totat]);
                            DB::table('account')->where('account_name',"Owners Equity")->update(['balance' =>$c_balance]);
                      
                            DB::table('account')->where('pk_id',"$bank_account")->update(['balance' => $totat]);
                            DB::table('account')->where('account_name',"$bank_account")->update(['balance' =>$c_balanceee]);
                      

                        





                         
                              
                                $account = DB::select("select* from account where account_type = 'Cash on Hand'");
                               
                                if(count($account)>0)
                                {
                                    $c_balance = $account[0]->increase + $total_amount; 
                                    // DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['balance' =>$c_balance]);
                                    DB::table('account')->where('pk_id',$account[0]->pk_id)->update(['increase' =>$c_balance]);
                                }
                                    else{
                
                                DB::insert("insert into account(account_type,account_name,description,balance,date) values (?,?,?,?,?)",array('Cash On Hand','Cash On Hand','Cash On Hand',$total_amount,NOW()));
                           
                                    }
                
                                    $account = DB::select("select* from bank_deposit where pk_id = '$last_id'");
                   
                                    
                
                                    $accounts= $account[0]->account_type;
                                   
                                    $accountss = DB::select("select* from account where pk_id = '$accounts'");
                                 
                                    if(count($accountss)>0)
                                    {
                                        $c_balance = $accountss[0]->increase + $total_amount; 
                
                                        DB::table('account')->where('pk_id',$accountss[0]->pk_id)->update(['increase' =>$c_balance]);
                              
                                    }
                        




                            
    
                      //     }else{
                            
                
                      // $total_amount = $request->input('current_balance');
    
    
                      //   $account = DB::select("select* from account where account_type = 'Cash On Hand'");
                      //        $c_balance = $account[0]->balance + $total_amount; 
                      //       DB::table('account')->where('account_type',"Cash On Hand")->update(['balance' =>$c_balance]);
                      //     }
    
                  
                     

    
                      return Redirect::back()->withErrors('PKR:' . $total_amount . ' is successfully Added');
            }
                 



           

        public function sale_report()
        {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
              return redirect('/admin');
          }
          $total_amount = DB::select("select SUM(amount) from detail_sale");
          $result = DB::select("select* from inventory");
         
          return view('admin.view_sale_reports',compact('total_amount','result'));
        }


        public function sale_detail_by_item_view($id) {
          if(!(session()->has('type') && session()->get('type')=='admin'))
          {
            return redirect('/admin');
          }
          $result = DB::select("select* from detail_sale,sale where detail_sale.sku = '$id' and detail_sale.sale_id = sale.pk_id");
        
          $total_amount = DB::select("select SUM(amount) from detail_sale where sku = '$id'");
            return view('admin.sale_detail_by_item_view',compact('total_amount','result'));
          
          }




          public function transfer_of_money() {
            if(!(session()->has('type') && session()->get('type')=='admin'))
            {
              return redirect('/admin');
            }
            $result = DB::select("select* from account where account_name != 'NULL' ");
           
          
            // $total_amount = DB::select("select SUM(amount) from detail_sale where sku = '$id'");
              return view('admin.transfer_of_money',compact('result'));
            
            }

            public function transfer_money(Request $request) {
    
              if(!(session()->has('type') && session()->get('type')=='admin'))
              {
                  return redirect('/admin');
              }
             
              if(!empty($request->input('date')))
              {
                $date = $request->input('date');
              }
              else
              {
                 $date = date('Y:m:d'); 
              }

            $fund_from_id =  $request->input('fund_from');
            
            $tansfer_amount =  $request->input('tansfer_amount');
            // return $tansfer_amount;
            $fund_to_id =  $request->input('fund_to');
            // return $fund_to_id;
             $fund_from = DB::select("select balance from account where pk_id = '$fund_from_id'");
             $account_data = DB::select("select* from account where pk_id = '$fund_from_id'");
             
             $account_type = $account_data[0]->account_type;
            //  return $account_type;
            
             $fund_to= DB::select("select balance from account where pk_id = '$fund_to_id'");
            //  $fund_to = $fund_to[0]->balance;
            //  return $fund_to;

            $fund_inc =  $fund_to[0]->balance + $tansfer_amount;

            
            $fund_dec =  $fund_from[0]->balance - $tansfer_amount;
            // return $fund_dec;
            
            DB::table('account')->where('pk_id',$fund_from_id)->update(['balance' =>$fund_dec]);
             
            DB::table('account')->where('pk_id',$fund_to_id)->update(['balance' =>$fund_inc]);


            DB::insert("insert into money_transfer(account_type,sender_account,recive_account,description,transfer_amount,date) 
            values (?,?,?,?,?,?)",
            array( $account_type, $fund_from_id,$fund_to_id, $request->input('description'),
           
            $tansfer_amount,  $date ));

          
     
            
            
            return Redirect::back()->withErrors('Your Amount Saved');;
           
                   }


                   public function trial_balance() {
                    if(!(session()->has('type') && session()->get('type')=='admin'))
                    {
                      return redirect('/admin');
                    }
                    $result = DB::select("select* from account  ");
                 
                    $total_amount = DB::table('account')->where('account_type', 'Sales Retail')->sum('increase');
                  $salee =  DB::select("select* from sale  ");
                  if(count($salee)>0)
                  {
                  $sale =  $salee[0]->sale_type;
                      
                  }
                  $detail_purchase =  DB::select("select* from detail_purchase where purchase_type='purchase'  ");

                  $detail_purchase_tax =  DB::select("select* from detail_tax_purchase where purchase_type='purchase'  ");

                  // return $detail_purchase;
$detail_purchase_sum_sim = DB::table('detail_purchase')->where('purchase_type', 'purchase')->sum('amount');

$detail_purchase_tax_sum = DB::table('detail_tax_purchase')->where('purchase_type', 'purchase')->sum('amount');

$detail_purchase_sum = $detail_purchase_sum_sim +  $detail_purchase_tax_sum;

// return $detail_purchase_sum;

$detail_purchase_return =  DB::select("select* from detail_purchase where purchase_type='return'  ");

$detail_purchase_return_tax =  DB::select("select* from detail_tax_purchase where purchase_type='return'  ");
// return $detail_purchase_return;
$detail_purchase_sum_return_sim = DB::table('detail_purchase')->where('purchase_type', 'return')->sum('amount');

$detail_purchase_sum_return_tax = DB::table('detail_tax_purchase')->where('purchase_type', 'return')->sum('amount');

$detail_purchase_sum_return = $detail_purchase_sum_return_sim + $detail_purchase_sum_return_tax;

// return $detail_purchase_sum_return;

// return $detail_purchase_sum;       

                  $total_amount2 = DB::table('account')->where('account_type', 'Cash on Hand')->sum('increase');
                  $total_amount3 = DB::table('account')->where('account_type', 'Cash on Hand')->sum('decrease');
                  $result = DB::select("select* from account where account_type = 'Sales Retail' ");
                $sale_inc= $result[0]->increase;
                $sale_decrease= $result[0]->decrease;

                $Capital = DB::select("select* from account where account_type = 'Capital' ");
                $Capital_inc= $Capital[0]->increase;


               
                $Capital_sub = DB::select("select * from account where  account_type='Owners Equity' LIMIT 1");
                // return $Capital_sub;
                if(count( $Capital_sub)>0)
               {
                $Capital_sub_inc= $Capital_sub[0]->increase;

               }
               else{
                $Capital_sub_inc='0';
               }

               $Capital_sub_decrease = DB::select("select * from account where  account_type='Owners Equity' and decrease != 'NULL'  ");
              //  return $Capital_sub_dec;
               if(count( $Capital_sub_decrease)>0)
              {
               $Capital_sub_dec= $Capital_sub_decrease[0]->decrease;

              }
              else{
               $Capital_sub_dec='0';
              }

                $result = DB::select("select* from account where account_type = 'Owners Equity' ");
                if(count($result)>0)
               {
                $own_inc= $result[0]->increase;
               }
                $result = DB::select("select* from account where account_type = 'Purchase' ");
                $pur_inc= $result[0]->increase;
                $expense = DB::select("select* from account where account_type = 'Expense' ");
                $expense_inc= $expense[0]->increase;

                // $result = DB::select("select* from account where sub_account = 'Owners investment' ");
                // $own_invest_inc= $result[0]->increase;



                $resullt = DB::select("select* from account where account_type = 'Cash on Hand' ");
              $coh_inc= $resullt[0]->increase;
              $coh_dec= $resullt[0]->decrease;
              $resullt2 = DB::select("select* from account where account_type = 'Account Receivable' ");
              $lib_inc= $resullt2[0]->increase;
              $lib_decrease= $resullt2[0]->decrease;
                  // return $total_amount;
                    // $total_amount = DB::select("select SUM(amount) from detail_sale where sku = '$id'");
                      return view('admin.trial_balance',compact('detail_purchase_return_tax','detail_purchase_tax','lib_decrease','sale_decrease','detail_purchase_return','detail_purchase_sum_return','expense','total_amount3','expense_inc','Capital_sub_dec','coh_dec','Capital_sub_decrease','Capital_sub_inc','Capital_sub','Capital','Capital_inc','detail_purchase_sum','detail_purchase','own_inc','pur_inc','sale_inc','coh_inc','lib_inc','total_amount2','result','sale', 'salee','total_amount'));
                    
                    }



                    public function trial_balance_print() {
                      if(!(session()->has('type') && session()->get('type')=='admin'))
                      {
                        return redirect('/admin');
                      }
                      $result = DB::select("select* from account  ");
                 
                      $total_amount = DB::table('account')->where('account_type', 'Sales Retail')->sum('increase');
                    $salee =  DB::select("select* from sale  ");
                    if(count($salee)>0)
                    {
                    $sale =  $salee[0]->sale_type;
                        
                    }
                    $detail_purchase =  DB::select("select* from detail_purchase  ");
  // return $detail_purchase;
  $detail_purchase_sum = DB::table('detail_purchase')->sum('amount');
  // return $detail_purchase_sum;       
  
                    $total_amount2 = DB::table('account')->where('account_type', 'Cash on Hand')->sum('increase');
                    $total_amount3 = DB::table('account')->where('account_type', 'Cash on Hand')->sum('decrease');
                    $result = DB::select("select* from account where account_type = 'Sales Retail' ");
                  $sale_inc= $result[0]->increase;
  
                  $Capital = DB::select("select* from account where account_type = 'Capital' ");
                  $Capital_inc= $Capital[0]->increase;
  
  
                 
                  $Capital_sub = DB::select("select * from account where  account_type='Owners Equity' LIMIT 1");
                  // return $Capital_sub;
                  if(count( $Capital_sub)>0)
                 {
                  $Capital_sub_inc= $Capital_sub[0]->increase;
  
                 }
                 else{
                  $Capital_sub_inc='0';
                 }
  
                 $Capital_sub_decrease = DB::select("select * from account where  account_type='Owners Equity' and decrease != 'NULL'  ");
                //  return $Capital_sub_dec;
                 if(count( $Capital_sub_decrease)>0)
                {
                 $Capital_sub_dec= $Capital_sub_decrease[0]->decrease;
  
                }
                else{
                 $Capital_sub_dec='0';
                }
  
                  $result = DB::select("select* from account where account_type = 'Owners Equity' ");
                  if(count($result)>0)
                 {
                  $own_inc= $result[0]->increase;
                 }
                  $result = DB::select("select* from account where account_type = 'Purchase' ");
                  $pur_inc= $result[0]->increase;
                  $expense = DB::select("select* from account where account_type = 'Expense' ");
                  $expense_inc= $expense[0]->increase;
  
                  // $result = DB::select("select* from account where sub_account = 'Owners investment' ");
                  // $own_invest_inc= $result[0]->increase;
  
  
  
                  $resullt = DB::select("select* from account where account_type = 'Cash on Hand' ");
                $coh_inc= $resullt[0]->increase;
                $coh_dec= $resullt[0]->decrease;
                $resullt2 = DB::select("select* from account where account_type = 'Liabilities' ");
                $lib_inc= $resullt2[0]->increase;
                    // return $total_amount;
                      // $total_amount = DB::select("select SUM(amount) from detail_sale where sku = '$id'");
                        return view('admin.trial_balance_print',compact('expense','total_amount3','expense_inc','Capital_sub_dec','coh_dec','Capital_sub_decrease','Capital_sub_inc','Capital_sub','Capital','Capital_inc','detail_purchase_sum','detail_purchase','own_inc','pur_inc','sale_inc','coh_inc','lib_inc','total_amount2','result','sale', 'salee','total_amount'));
                       
                      }




public function admin_list()
{
  $result = DB::select("select* from admin_details");

  return view('admin.admin_list', compact('result'));
  
}
public function admin_detail($id)
{
  $result = DB::select("select* from admin_details where pk_id= '$id'");

  return view('admin.admin_detail', compact('result'));
  
}
   
public function add_admin_view()
{
  return view('admin.add_admin');
}

public function create_admin(Request $request)
{
    if (!(session()->has('type') && session()
        ->get('type') == 'admin'))
    {
        return redirect('/admin');
    }

    $Machine_Management = 0;
    $Machine_Management_edit = 0;
    $Machine_Management_delete = 0;

    $Admin_Management = 0;

    $Expense_Management = 0;
    $Expense_Management_edit = 0;
    $Expense_Management_delete = 0;
    
    $Customer_Management = 0;
    $Customer_Management_edit = 0;
    $Customer_Management_delete = 0;

    $Sales_Management = 0;
    $Sales_Management_edit = 0;
    $Sales_Management_delete = 0;

    $Supplier_Management = 0;
    $Supplier_Management_edit = 0;
    $Supplier_Management_delete = 0;

    $Purchase_Management = 0;
    $Purchase_Management_edit = 0;
    $Purchase_Management_delete = 0;

    $Category_Management = 0;
    $Category_Management_edit = 0;
    $Category_Management_delete = 0;

    $Report = 0;
    $Report_edit = 0;
    $Report_delete = 0;

    $Item_Management = 0;
    $Item_Management_edit = 0;
    $Item_Management_delete = 0;

    $Kachi_Parchi = 0;
    $Kachi_Parchi_edit = 0;
    $Kachi_Parchi_delete = 0;

    $Pump_Management = 0;
    $Pump_Management_edit = 0;
    $Pump_Management_delete = 0;

    $Accounts_Management = 0;
    $Accounts_Management_edit = 0;
    $Accounts_Management_delete = 0;
    
    
    
    
    if ($request->input('Machine_Management'))
    {
        $Machine_Management = 1;
    }
    if ($request->input('Machine_Management_edit'))
    {
        $Machine_Management_edit = 1;
    }
    if ($request->input('Machine_Management_delete'))
    {
        $Machine_Management_delete = 1;
    }


    if ($request->input('Admin_Management'))
    {
        $Admin_Management = 1;
    }

    if ($request->input('Expense_Management'))
    {
        $Expense_Management = 1;
    }
    if ($request->input('Expense_Management_edit'))
    {
        $Expense_Management_edit = 1;
    }
    if ($request->input('Expense_Management_delete'))
    {
        $Expense_Management_delete = 1;
    }





    if ($request->input('Customer_Management'))
    {
        $Customer_Management = 1;
    }
    if ($request->input('Customer_Management_edit'))
    {
        $Customer_Management_edit = 1;
    }
    if ($request->input('Customer_Management_delete'))
    {
        $Customer_Management_delete = 1;
    }




    if ($request->input('Sales_Management'))
    {
        $Sales_Management = 1;
    }
    if ($request->input('Sales_Management_edit'))
    {
        $Sales_Management_edit = 1;
    }
    if ($request->input('Sales_Management_delete'))
    {
        $Sales_Management_delete = 1;
    }



    if ($request->input('Supplier_Management'))
    {
        $Supplier_Management = 1;
    }
    if ($request->input('Supplier_Management_edit'))
    {
        $Supplier_Management_edit = 1;
    }
    if ($request->input('Supplier_Management_delete'))
    {
        $Supplier_Management_delete = 1;
    }



    if ($request->input('Purchase_Management'))
    {
        $Purchase_Management = 1;
    }
    if ($request->input('Purchase_Management_edit'))
    {
        $Purchase_Management_edit = 1;
    }
    if ($request->input('Purchase_Management_delete'))
    {
        $Purchase_Management_delete = 1;
    }



    if ($request->input('Category_Management'))
    {
        $Category_Management = 1;
    }
    if ($request->input('Category_Management_edit'))
    {
        $Category_Management_edit = 1;
    }
    if ($request->input('Category_Management_delete'))
    {
        $Category_Management_delete = 1;
    }




    if ($request->input('Report'))
    {
        $Report = 1;
    }
    if ($request->input('Report_edit'))
    {
        $Report_edit = 1;
    }
    if ($request->input('Report_delete'))
    {
        $Report_delete = 1;
    }



   
    if ($request->input('Item_Management'))
    {
        $Item_Management = 1;
    }
    if ($request->input('Item_Management_edit'))
    {
        $Item_Management_edit = 1;
    }
    if ($request->input('Item_Management_delete'))
    {
        $Item_Management_delete = 1;
    }




    if ($request->input('Kachi_Parchi'))
    {
        $Kachi_Parchi = 1;
    }
    if ($request->input('Kachi_Parchi_edit'))
    {
        $Kachi_Parchi_edit = 1;
    }
    if ($request->input('Kachi_Parchi_delete'))
    {
        $Kachi_Parchi_delete = 1;
    }



    if ($request->input('Pump_Management'))
    {
        $Pump_Management = 1;
    }
    if ($request->input('Pump_Management_edit'))
    {
        $Pump_Management_edit = 1;
    }
    if ($request->input('Pump_Management_delete'))
    {
        $Pump_Management_delete = 1;
    }




    if ($request->input('Accounts_Management'))
    {
        $Accounts_Management = 1;
    }
    if ($request->input('Accounts_Management_edit'))
    {
        $Accounts_Management_edit = 1;
    }
    if ($request->input('Accounts_Management_delete'))
    {
        $Accounts_Management_delete = 1;
    }



    if ($Machine_Management == 0 && $Admin_Management == 0 && $Expense_Management == 0 &&
     $Customer_Management == 0 && $Sales_Management == 0 && $Supplier_Management == 0 
     && $Purchase_Management == 0 && $Category_Management == 0 && $Report == 0
     && $Item_Management == 0 && $Kachi_Parchi == 0 && $Pump_Management == 0 && $Accounts_Management == 0
     )
    {
        return Redirect::back()->withErrors('atleast you neeed to select one permission');

    }

    if ($request->input('pass') == $request->input('confirm'))
    {
        $username = $request->input('username');

        $result = DB::select("select* from admin_details where username = '$username' ");

        if (count($result) > 0)
        {

            return Redirect::back()->withErrors('Username already Exist');
        }
        else
        {
          DB::insert("insert into admin_details (fname,lname, username, password, Machine_Management,
          Machine_Management_edit,Machine_Management_delete,
          Admin_Management, Expense_Management, Expense_Management_edit, Expense_Management_delete,
          Customer_Management,Customer_Management_edit, Customer_Management_delete,
          Sales_Management,Sales_Management_edit, Sales_Management_delete,
          Supplier_Management,Supplier_Management_edit,Supplier_Management_delete,
          Purchase_Management,Purchase_Management_edit, Purchase_Management_delete,
          Category_Management,Category_Management_edit, Category_Management_delete,
          Report,Report_edit, Report_delete,
          Item_Management,Item_Management_edit, Item_Management_delete,
          Kachi_Parchi,Kachi_Parchi_edit, Kachi_Parchi_delete,
          Pump_Management,Pump_Management_edit, Pump_Management_delete,
           Accounts_Management,Accounts_Management_edit,Accounts_Management_delete)
            values (?,?,?,?
            ,?,?,?,?,?,?,
            ?,?,?,?,?,?,
            ?,?,?,?,?,?,
            ?,?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?)", array(
                $request->input('fname') ,
                $request->input('lname') ,
                $request->input('username') ,
                md5($request->input('pass')) ,
                $Machine_Management, $Machine_Management_edit, $Machine_Management_delete,
                $Admin_Management,
                $Expense_Management,$Expense_Management_edit,$Expense_Management_delete,
                $Customer_Management, $Customer_Management_edit, $Customer_Management_delete,
                $Sales_Management,$Sales_Management_edit,$Sales_Management_delete,
                $Supplier_Management, $Supplier_Management_edit, $Supplier_Management_delete,
                $Purchase_Management, $Purchase_Management_edit, $Purchase_Management_delete,
                $Category_Management,$Category_Management_edit,$Category_Management_delete,
                $Report,$Report_edit,$Report_delete,
                $Item_Management,$Item_Management_edit,$Item_Management_delete,
                $Kachi_Parchi,$Kachi_Parchi_edit,$Kachi_Parchi_delete,
                $Pump_Management, $Pump_Management_edit, $Pump_Management_delete,
                $Accounts_Management, $Accounts_Management_edit, $Accounts_Management_delete
            ));

            return redirect('/admin/home/view/list');
        }

    }
    else
    {
        return Redirect::back()->withErrors('Password does not match');
    }
}





public function print_page_purchase()
{
    if (!(session()->has('type') && session()
        ->get('type') == 'admin'))
    {
        return redirect('/admin');
    }
    $total_amount = DB::select("select SUM(total_amount) from purchase");
    $result = DB::select("select* from purchase");
    $result1 = DB::select("select* from supplier");
    // return $result[0]->supplier_name;
    return view('admin.print_page_purchase', compact('result', 'result1', 'total_amount'));

}























            
}
