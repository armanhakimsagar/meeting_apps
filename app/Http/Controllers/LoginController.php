<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Session;
Use App\access_token;

class LoginController extends Controller {

    public function MatchData(Request $request) {
        
        $password = md5($request->passwords);
        $super_admin = registration::where('name', $request->username)
                ->where('passwords', $password)
                ->where('admin_role', 1)
                ->get();



        $developer_admin = registration::where('name', $request->username)
                ->where('passwords', $password)
                ->where('admin_role', 2)
                ->get();

        if (count($super_admin) == 1) {
            session(['SuperAdmin' => 'SuperAdmin']);
            session(['UserId' => $request->username]);
            return redirect('admin/meeting');
        } elseif (count($developer_admin) == 1) {
            session(['DeveloperAdmin' => 'DeveloperAdmin']);
            session(['UserId' => $request->username]);
            return redirect('developer/company_registration');
        } else {
            $request->session()->flash('login_error', 'User name or password not match');
            return view('login');
        }
    }
    
    public function Logout(){
        Session::forget('SuperAdmin');
        Session::forget('DeveloperAdmin');
        Session::flush();
        return redirect('/');
    }
    
    
    public function SignIn($username,$passwords){
        
        $token = md5(rand(0,9));
        
        $registration = registration::where('name',$username)->where('passwords',$passwords)->get();
        
        foreach($registration as $registrations){
           $userid = $registrations->id;
        }
        
         if(count($registration) == 0){
            $feedback = [
                'status'     => "error",
                'message'    => "data not found",
                'data'       => null
             ]; 

         }else{
             $feedback = [
                'status'            => "success",
                'message'           => "data found",
                'user id'           => $userid,
                'access_toekn'      => $token
             ]; 
         }
         
         // insert token
         
         $insert_token              = new access_token();
         $insert_token->token       = $token;
         $insert_token->userid      = $userid;
         $insert_token->save();
         
         return $feedback;
         
    }

    public function Contacts()
    {
        $company = registration::all();
        if(count($company) == 0){
           $feedback = [
               'status'     => "error",
               'message'    => "data not found",
               'data'       => null
            ]; 

        }else{
            $feedback = [
               'status'     => "success",
               'message'    => "data found",
               'data'       => $company
            ]; 
        }

        return $feedback;
    }
}
