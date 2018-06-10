<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mind_share;
use Session;

class MindshareController extends Controller
{
    public function MindshareView(){
        
        $user           = Session::get('UserId');
        $user_id        = get_userid($user);
        $company_id     = get_company_id($user_id);
        $mind_shares    = mind_share::where('company_id',$company_id)->paginate(10);
        return view('mind_share', compact('mind_shares'));
    }
    
    public function MindsharePublish($id){
        
        $mind_shares = mind_share::find($id);
        $mind_shares->status = 1;
        $mind_shares->save();
        $mind_shares = mind_share::all();
        return redirect()->back();
        
    }
    
    public function MindshareUnpublish($id){
        
        $mind_shares = mind_share::find($id);
        $mind_shares->status = 0;
        $mind_shares->save();
        $mind_shares = mind_share::all();
        return redirect()->back();
        
    }
    
}
