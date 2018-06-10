<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Registration;
use Session;

class UserController extends Controller
{
    public function UserDataInsert(Request $request){
        
        $validator = Validator::make($request->all(), [
                'name'              => 'required|max:200',
                'email'             => 'required|email|unique:registrations',
                'passwords'         => 'required|min:8|max:15',
                'phone'             => 'required|unique:registrations|regex:/(01)[0-9]{9}/',
                'admin_role'        => 'required|integer',
                'picture'           => 'required|max:200',
                'designation'       => 'required|max:200',
                'admin_role'        => 'required|integer'
                
            ]);
            if ($validator->fails()) {
            return redirect('admin/admin_create')
                            ->withErrors($validator)
                            ->withInput();
            } else {        
                
                $registration                         = new Registration;
                $registration->name                   = $request->name;
                $registration->email                  = $request->email;           
                $registration->passwords              = md5($request->passwords);              
                $registration->designation            = $request->designation;    
                $registration->phone                  = $request->phone; 
                $registration->admin_role             = $request->admin_role; 
                
                if ($request->hasFile('picture')) {
                    
                    $image                          = $request->file('picture');
                    $name                           = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath                = public_path('/images');
                    $image->move($destinationPath, $name);
                    $registration->picture          = $name;
                }
                
                $registration->save();
                
                
             

                Session::flash('user_msg', 'Inserted Successfully!'); 
                return redirect('admin/user_list');
        }
    }
    
    public function UserListShow(){
        
        $user_data = registration::orderBy('created_at', 'desc')->Paginate(10);
        return view('User.user_list',compact('user_data'));
    }
    
    public function UserDataDelete($id){
           
        $user_delete                    = Registration::find($id);
        $companies_table_check          = DB::table('companies')->where('user_id', $user_delete->id)->get();
        $mind_shares_table_check        = DB::table('mind_shares')->where('user_id', $user_delete->id)->get();
        $question_replies_table_check   = DB::table('question_replies')->where('userid', $user_delete->id)->get();
       
        if(count($companies_table_check) > 0){
            $user_data = DB::table('registrations')->get();
            Session::forget('delete_success');
            Session::forget('question_replies_dependency');
            Session::forget('mind_shares_dependency');
            
            Session::flash('companies_dependency', 'First delete that Company which depends on this user!'); 
            $user_data = registration::orderBy('created_at', 'desc')->Paginate(10);;
            return view('User.user_list',compact('user_data'));
        }
        
         elseif (count($question_replies_table_check) > 0) {
            $user_data = DB::table('registrations')->get();
            Session::forget('delete_success');
            Session::forget('mind_shares_dependency');
            Session::forget('companies_dependency');
            Session::flash('question_replies_dependency', 'First delete all the replies of the user and then you can delete that user!'); 
            $user_data = registration::orderBy('created_at', 'desc')->Paginate(10);
            return view('User.user_list',compact('user_data'));
        }
        elseif (count($mind_shares_table_check) > 0) {
            $user_data = DB::table('registrations')->get();
            Session::forget('delete_success');
            Session::forget('companies_dependency');
            Session::forget('question_replies_dependency');
            Session::flash('mind_shares_dependency', 'First delete all the Mind shares data and then you can delete that user!'); 
            $user_data = registration::orderBy('created_at', 'desc')->Paginate(10);
            return view('User.user_list',compact('user_data'));
        
        }
       
        else{
             $user_data = Registration::find($id);    
             $user_data->delete();
             Session::forget('companies_dependency');
             Session::forget('mind_shares_dependency');
             Session::forget('question_replies_dependency'); 
             $user_data = registration::orderBy('created_at', 'desc')->Paginate(10);
             Session::flash('delete_success', 'Deleted Successfully!'); 
             return redirect()->back();
        }
        
    }
    
   
    
     public function UserDataEdit($id){
         
         $user_data = DB::table('registrations')->where('id', $id)->first(); 
         $user              = Session::get('UserId');
         $company_id        = get_company_id($user);
         $company           = get_company_name($company_id); 
         return view('User.user_edit', compact('user_data','company','company_id'));
         
    }
    
     public function UserDataUpdate(Request $request){
         $validator = Validator::make($request->all(), [
                'name'              => 'required|max:200',
                'email'             => 'required|email|unique:registrations',
                'phone'             => 'required|unique:registrations|regex:/(01)[0-9]{9}/',
                'admin_role'        => 'integer',
                'picture'           => 'max:200',
                'designation'       => 'required|max:200',
                'admin_role'        => 'integer'
            ]);
            if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            } else {

                $registration                         = registration::find($request->update_user_id);
                $registration->name                   = $request->name;
                $registration->email                  = $request->email;                     
                $registration->designation            = $request->designation;  
                $registration->phone                  = $request->phone; 
                $registration->admin_role             = $request->admin_role;                       
                $new_password                         = $request->old_password;
                
                if($request->passwords == ""){
                   $registration->passwords           = $new_password;
                }else{
                     $registration->passwords         = md5($request->passwords);
                }
           
                if($request->hasFile('picture')){
                    
                    
                    $image = $request->file('picture');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                    $registration->picture            = $name; 

                }else{
                    $registration->picture            = $request->old_image;
                }
                
               $registration->save();     
                    
            Session::flash('user_msg', 'Updated Successfully!'); 
            return redirect('admin/user_list');
        }
     }

     
     public function AdminCreate(){
         return view('admin_create');
     }
}
