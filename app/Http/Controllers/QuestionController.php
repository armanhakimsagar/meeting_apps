<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Validator;
use App\Question_option;
use App\meeting;
use App\agenda;
use App\question_reply;
use App\registration;
use Session;
use DB;

class QuestionController extends Controller {

    public function CreateQuestion(){
        $id = get_userid(Session::get('UserId'));
        $meeting_lists      = Meeting::where('user_id',$id)->get();
        $agenda_lists       = Agenda::all();
        return view('create_question',compact('meeting_lists','agenda_lists'));
    }
    public function SingleInsert(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'meeting_id'            => 'required|integer',
            'agenda_id'             => 'required|integer',
            'question_title'        => 'required|max:10000',
            'check'                 => 'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect('admin/create_question')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            
            $question                   = new Question;
            $question->question_title   = $request->question_title;
            $question->status           = 0;
            $question->send             = 0;
            $question->question_type_id = 1;
            $question->meeting_id       = $request->meeting_id;
            $question->agenda_id        = $request->agenda_id;
            $question->userid           = $request->userid;
            if (isset($request->behalf_of)) {
                $question->behalf_of    = $request->behalf_of;
            } else {
                $question->behalf_of    = 0;
            }
            $question->save();
        }
        
        if(isset($request->redirect)){
            $request->session()->flash('insert_success', 'Inserted Successfully');
            return redirect('admin/list');
        }else{
            $request->session()->flash('insert_success', 'Inserted Successfully');
            return redirect('admin/create_question');
        }
        
    }

    public function MultipleInsert(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'meeting_id'            => 'required|integer',
            'agenda_id'             => 'required|integer',
            'question_title'        => 'required|max:10000',
            'check'                 => 'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect('admin/create_question')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            
            $question                   = new Question;
            $question->question_title   = $request->question_title;
            $question->status           = 0;
            $question->send             = 0;
            $question->question_type_id = 2;
            $question->meeting_id       = $request->meeting_id;
            $question->agenda_id        = $request->agenda_id;
            $question->userid           = $request->userid;
            if (isset($request->behalf_of)) {
                $question->behalf_of    = $request->behalf_of;
            } else {
                $question->behalf_of    = 0;
            }
            $question->save();
        }
        
        if(isset($request->redirect)){
            $request->session()->flash('insert_success', 'Inserted Successfully');
            return redirect('admin/list');
        }else{
            $request->session()->flash('insert_success', 'Inserted Succsessfully');
            return redirect('admin/create_question');
        }
    }
   

    public function MultiSelect(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'meeting_id'            => 'required|integer',
            'agenda_id'             => 'required|integer',
            'question_title'        => 'required|max:10000',
            'check'                 => 'required|integer'
        ]);
        if ($validator->fails()) {
            return redirect('admin/create_question')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            
            $question                   = new Question;
            $question->question_title   = $request->question_title;
            $question->status           = 0;
            $question->send             = 0;
            $question->question_type_id = 3;
            $question->meeting_id       = $request->meeting_id;
            $question->agenda_id        = $request->agenda_id;
            $question->userid           = $request->userid;
            if (isset($request->behalf_of)) {
                $question->behalf_of    = $request->behalf_of;
            } else {
                $question->behalf_of    = 0;
            }
            $question->save();
        }
        
        $question_id = $question->id;
                
        $loop = $request->loop;

        for ($i = 1; $i <= $loop; $i++) {
            $question_options                     = new Question_option;
            $question_options->option_title       = $request->input('option_title'.$i);
            $question_options->question_id        = $question_id;
            $question_options->save();

        }
        if(isset($request->redirect)){
            $request->session()->flash('insert_success', 'Inserted Successfully');
            return redirect('admin/list');
        }else{
            $request->session()->flash('insert_success', 'Inserted Successfully');
            return redirect('admin/create_question');
        }
    }
    
    public function QuestionList(){

        $question_lists     = Question::orderBy('created_at', 'desc')->Paginate(10);
        $meeting_lists      = Meeting::all();
        $agenda_lists       = Agenda::all();
        return view('list', compact('question_lists','meeting_lists','agenda_lists'));

    }
    
    public function PublishQuestion($id){
        $Question = Question::find($id);
        $Question->send = 1;
        $Question->save();
        Session::flash('publish_success', 'Publish Successfully!'); 
        return redirect('admin/list');
    }
    
    public function MeetingData(){
        $meetingdata    = DB::table('meetings')->get();
        $data_array     =   [];
        foreach($meetingdata as $key => $value){
            $data_array[]   =[
                'value' =>  $value->id,
                'label' =>  $value->title
            ];
        }// end of foreach
        
        if(isset($data_array) && !empty($data_array)){
            $feedback_data  =   [
                'status'    => "success",
                'data'      => $data_array,
                'message'   => "Data Found"
            ];
        }else{
            $feedback_data  =   [
                'status'    => "error",
                'data'      => "",
                'message'   => "Data not Found"
            ];
        }
        
        return json_encode($feedback_data);
    }

    
    public function AgendaData(){
        $meetingdata    = DB::table('agendas')->get();
        $data_array     =   [];
        foreach($meetingdata as $key => $value){
            $data_array[]   =[
                'value' =>  $value->id,
                'label' =>  $value->agenda_name
            ];
        }// end of foreach
        
        if(isset($data_array) && !empty($data_array)){
            $feedback_data  =   [
                'status'    => "success",
                'data'      => $data_array,
                'message'   => "Data Found"
            ];
        }else{
            $feedback_data  =   [
                'status'    => "error",
                'data'      => "",
                'message'   => "Data not Found"
            ];
        }
        
        return json_encode($feedback_data);
    }
    
    public  function ResultView($question_type,$id){
        if($question_type == 1){
            
            $question               = Question::where('id',$id)->get();
            $question_replies       = question_reply::where('question_id',$id)->get();
            
            return view('result_bar',compact('question','question_replies','question_type','id'));
            
        }elseif($question_type == 2){
            
            $questions                  = Question::where('id',$id)->get();
            return view('result_comment',compact('questions'));
            
        }else{
            
            $questions                  = Question::where('id',$id)->get();
            $question_replies           = question_reply::where('question_id',$id)->get();
            
            return view('result_multiple',compact('questions','question_replies'));
            
        }
    }
    
    public function AutoSink($id){
        $question_replies           = question_reply::where('question_id',$id)->get();
        $data = view('reply_data',compact('questions','question_replies'));
        echo $data;
    }
    //Fetching the Chart Data
    public function ChartDataGet(Request $request){
        
        header("Content-type: text/json");
        $feedbackData = array();
       $chart_data = DB::table('question_replies')
                    ->select(DB::raw('count(reply) as y,  reply')) 
                    ->where('question_id','=', $request->ques_id) 
                    ->groupBy('reply')
                    ->get();
        if (!empty($chart_data)) {
            foreach($chart_data as $chart) {
               $feedbackData[0][] = $chart->y;
            }
        } 
        echo json_encode($feedbackData); die;
    }
}
