<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Company;
use App\Registration;
use App\department;
use Session;
use DB;

class DeveloperController extends Controller {

    public function CompanyRegistration(Request $request) {
        
        $validator = Validator::make($request->all(), [
                    'company_name'  => 'required|max:400',
                    'parent_company'=> 'required|integer',
                    'user_id'       => 'required|integer',
                    'address_1'     => 'required|max:1000',
                    'address_2'     => 'required|max:1000',
                    'company_logo'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('developer/company_registration')
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $this->validate($request, [
                'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }


            $company = new company;

            $company->name           =  $request->company_name;
            $company->parent_company =  isset($request->parent_company)?$request->parent_company:0;
            $company->user_id        =  isset($request->user_id)?$request->user_id:0;
            $company->address_1      =  $request->address_1;
            $company->address_2      =  $request->address_2;
            $company->company_logo   =  $name;
            $company->save();

            $company_id = $company->id;
            $posts = company::all();
            Session::flash('user_msg', 'Inserted Successfully!'); 
            return redirect('developer/company_view');
        }
    }

    public function ViewCompanys() {
        $companies = company::all();
        return view('developer_admin/company_view', compact('companies'));
    }
    
    public function CompanyRegisterView() {
        $companies = company::all();
        $registrations = registration::all();
        return view('developer_admin/company_registration', compact('companies','registrations'));
    }
    
     public function CompanyDataEdit($id){
         $company_data = DB::table('companies')->where('id', $id)->first();
         $companies = company::all();
         $registrations = registration::all();
         return view('developer_admin/company_edit', compact('company_data','companies','registrations'));
    }
    
    public function CompanyDataUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
                    'company_name'  => 'required|max:400',
                    'address_1'     => 'required|max:1000',
                    'address_2'     => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            Session::flash('alert_msg', 'Updated Unsuccessfull!!!'); 
            return redirect('developer/company_edit/'.$request->update_company_id);
        } else {

            if($request->hasFile('company_logo')){
                $this->validate($request, [
                    'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
            
            if ($request->hasFile('company_logo')) {
                $image = $request->file('company_logo');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }


            $company                 =  company::find($request->update_company_id);
            $company->name           =  $request->company_name;
            $company->parent_company =  $request->parent_company !="" ?$request->parent_company:0;
            $company->user_id        =  $request->user_id;
            $company->address_1      =  $request->address_1;
            $company->address_2      =  $request->address_2;
            if($request->hasFile('company_logo')){
                $company->company_logo            = $name; 
            }else{
                $company->company_logo            = $request->old_picture;
            }
            
            $company->save();
            
            $posts = company::all();
            Session::flash('user_msg', 'Update Successfully!'); 
            return redirect('developer/company_view');
            
        }
    }
    
    public function CompanyDataDelete($id){        
        $post_delete = company::find($id);    
        $post_delete->delete();
        return redirect()->back()->with('user_msg', 'Deleted Successfully!');
    }
    public function ViewUser() {
        
        $users = registration::orderBy('created_at', 'desc')->Paginate(10);
        return view('developer_admin/user_view', compact('users'));
    }
    
    public function UserRegisterView() {
        $companies = company::all();
        return view('developer_admin/user_registration', compact('companies'));
    }

    public function UserRegistration(Request $request) {
        $validator = Validator::make($request->all(), [
                    'user_name'     => 'required|max:500',
                    'email'         => 'required|max:500',
                    'phone'         => 'required|unique:registrations|regex:/(01)[0-9]{9}/',
                    'passwords'     => 'required|min:8|max:15',
                    'designation'   => 'required|max:500',
                    'picture'       => 'required'
        ]);
        if ($validator->fails()) {
        return redirect('developer/user_registration_view')
                        ->withErrors($validator)
                        ->withInput();
        } else {       
            if ($request->hasFile('picture')) {
                
                $this->validate($request, [
                    'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image = $request->file('picture');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            
            $registration = new registration;

            $registration->name         = $request->user_name;
            $registration->email        = $request->email;
            $registration->passwords    = md5($request->passwords);
            $registration->phone        = $request->phone;
            $registration->designation  = $request->designation;
            if ($request->hasFile('picture')) {
                $registration->picture      = $name;
            }else{
                $registration->picture      = $request->old_image;
            }
            $registration->admin_role   = 1;

            $registration->save();
            
            Session::flash('user_msg', 'Inserted Successfully!'); 
            return redirect('developer/user_view');
        }
    }
    
    public function UserDataEdit($id){

         $user_data = DB::table('registrations')->where('id', $id)->first();
         $companies = company::all();
         return view('developer_admin/user_edit', compact('user_data','companies'));
    }
   
    
     public function UserDataUpdate(Request $request){  
         
         $validator = Validator::make($request->all(), [
                
                'user_name'     => 'required|max:500',
                'email'         => 'required|max:500',
                'phone'         => 'required|unique:registrations|regex:/(01)[0-9]{9}/',
                'designation'   => 'required|max:500',
             
                
            ]);
            if ($validator->fails()) {
                return redirect('developer/user_edit/'.$request->update_user_id)
                           ->withErrors($validator)
                           ->withInput();
           }else {
                
                $registration                         = registration::find($request->update_user_id);
                $registration->name                   = $request->user_name;
                $registration->email                  = $request->email;    
                if($request->passwords != ""){
                    $registration->passwords          = md5($request->passwords);   
                }else{
                    $registration->passwords          = $request->old_password;
                }
                $registration->designation            = $request->designation;  
                $registration->phone                  = $request->phone; 
                $registration->admin_role             = 1; 
                
                if ($request->hasFile('picture')) {
                    $image = $request->file('picture');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                    $registration->picture            = $name; 
                }else{
                    $registration->picture            = $request->old_picture;
                }
                $registration->save();
           
            Session::flash('user_msg', 'Updated Successfully!'); 
            return redirect('developer/user_view');
        }
     }
     
     public function UserDataDelete($id){   
         
        $user_data   = registration::orderBy('created_at', 'desc')->Paginate(10);
        $post_delete = Registration::find($id);  
        $companies_table_check = DB::table('companies')->where('user_id', $id)->get();
        $question_replies_table_check = DB::table('question_replies')->where('userid', $id)->get();
        $mind_shares_table_check = DB::table('mind_shares')->where('user_id', $id)->get();
        
        if(count($companies_table_check) > 0){
            Session::forget('question_reply');
            Session::forget('mind_share');
            Session::flash('company_msg', 'First delete that company which depends on this user!'); 
            return view('user.user_list',compact('user_data'));
        }
        else if(count($question_replies_table_check) > 0){
            Session::forget('company_msg');
            Session::forget('mind_share');
            Session::flash('question_reply', 'First delete that question replies which depends on this user!'); 
            return view('user.user_list',compact('user_data'));
        }
        else if(count($mind_shares_table_check) > 0){
            Session::forget('question_reply');
            Session::forget('company_msg');
            Session::flash('mind_share', 'First delete that mindshare which depends on this user!'); 
            
            return view('user.user_list',compact('user_data'));
        }
        
        
        
        $post_delete->delete();
        
        return redirect()->back()->with('user_msg', 'Deleted Successfully!');
    }

    public function DepartmentView(){
       $companies = company::all();
       $departments = department::all();
       return view('developer_admin.department_add',compact('companies','departments'));
       
    }
    
    
    public function DepartmentPost(Request $request){
            
            $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'company_id'        => 'required'
                
            ]);
            
            if ($validator->fails()) {
            return redirect('developer/department_view')
                            ->withErrors($validator)
                            ->withInput();
            } else {
                
                $department                         = new department;
                $department->name                   = $request->name;
                $department->company_id             = $request->company_id;    
                $department->save();
           
            Session::flash('user_msg', 'Inserted Successfully!'); 
            return redirect('developer/department_view');
        }
    }
    
    
     public function DepartmentUpdate(Request $request){
                    
            $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'company_id'        => 'required'
                
            ]);
            if ($validator->fails()) {
                return redirect('developer/department_view'.$request->id);
            } else {
                
                $department                         = department::find($request->id);
                $department->name                   = $request->name;
                $department->company_id             = $request->company_id;    
                $department->save();
           
            Session::flash('user_update', 'Updated Successfully!'); 
            return redirect('developer/department_view');
        }
    }
    
    
    public function DepartmentEdit($id){
       
       $companies = company::all();
       $departments = department::all();
       $department_edits = department::where('id',$id)->get();
       return view('developer_admin.department_edit',compact('department_edits','companies','departments'));
       
    }

    
    public function DepartmentDelete($id){
        
        $department = department::find($id);    
        $department->delete();
        
        return redirect()->back()->with('dep_msg', 'Deleted Successfully!');
    
        
    }
    
}
