<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ChartController extends Controller
{
    //Fetching the Chart Data
    public function ChartDataGet(Request $request){
//     echo "Chart Id <br>";
//     echo $request->ques_id;
//     exit;  
     return $chart_data = DB::table('question_replies')
                    ->select(DB::raw('count(reply) as y,  reply')) 
                    ->where('question_id','=', 47) 
                    ->groupBy('reply')
                    ->get();
    }
}
