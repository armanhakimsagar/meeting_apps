<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Meeting;
use App\Agenda;
use Session;
use DB;

class MeetingController extends Controller
{
    public function InsertMeeting(Request $request){
        
        $start_time = strtotime($request->start_time);
        $end_time   = strtotime($request->end_time);
        
        $validator = Validator::make($request->all(), [
                
                    'title'           => 'required|max:1000',
                    'description'     => 'required|max:10000',
                    'start_time'      => 'required|max:14',
                    'end_time'        => 'required|max:14',
                    'location'        => 'required|max:100',
                    'code'            => 'required|max:1000',
                    'presenter'       => 'required|max:100'
                
            ]);
            if ($validator->fails()) {
            return redirect('admin/meeting')
                            ->withErrors($validator)
                            ->withInput();
            } else {
                
                $meeting                = new meeting;
                $meeting->title         = $request->title;
                $meeting->description   = $request->description;
                $meeting->start_time    = $start_time;
                $meeting->end_time      = $end_time;
                $meeting->code          = $request->code;
                $meeting->location      = $request->location;
                $meeting->presenter     = $request->presenter;
                $meeting->user_id       = get_userid(Session::get('UserId'));
                $meeting->save();
                
                $meeting_id = $meeting->id;
                
                    $loop = $request->count;

                    for ($i = 1; $i <= $loop; $i++) {
                        $agenda                 = new agenda;
                        $agenda->agenda_name    = $request->input('agenda_name_'.$i);
                        $agenda->speaker        = $request->input("speaker_$i");
                        $agenda->room           = $request->input("room_$i");
                        $agenda->meeting_id     = $meeting_id;
                        $agenda->save();

                    }
                }
                Session::flash('meeting_msg', 'Inserted Successfully!'); 
                return redirect('admin/meeting');

            
    }
    
    public function MeetingView(){
        $meetings = meeting::paginate(10);
        return view('meeting_list', compact('meetings'));
    }
    
    
    public function MeetingEdit($id){
        $meeting_edits = meeting::find($id);
        $agendas = agenda::where('meeting_id',$id)->get();
        $agendas++;
        $agenda_count = count($agendas);
        return view('meeting_edit', compact('meeting_edits','agendas','agenda_count'));
    }
    
    public function UpdateMeeting(Request $request){
        //dd($request->all());
        $start_time = strtotime($request->start_time);
        $end_time   = strtotime($request->end_time);
        
        $validator = Validator::make($request->all(), [

                'title'           => 'required|max:1000',
                'description'     => 'required|max:10000',
                'start_time'      => 'required|max:14',
                'end_time'        => 'required|max:14',
                'location'        => 'required|max:100',
                'code'            => 'required|max:1000',
                'presenter'       => 'required|max:100'

        ]);
        if ($validator->fails()) {
        return redirect('admin/meeting_edit/'.$request->update_id)
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $meeting                = meeting::find($request->update_id);
            
            $meeting->title         = $request->title;
            $meeting->description   = $request->description;
            $meeting->start_time    = $start_time;
            $meeting->end_time      = $end_time;
            $meeting->code          = $request->code;
            $meeting->location      = $request->location;
            $meeting->presenter     = $request->presenter;
            $meeting->user_id       = get_userid(Session::get('UserId'));
            $meeting->save();

            $meeting_id             = $meeting->id;
            $loop                   = $request->count;
            
            DB::table('agendas')->where('meeting_id', $meeting->id)->delete();
            
            for ($i = 1; $i <= $loop; $i++) {
                
                $data = DB::table('agendas')
                    ->insert([
                                'agenda_name' => $request->input('agenda_name_'.$i), 
                                'speaker' => $request->input('agenda_name_'.$i),
                                'room' => $request->input("room_$i"),
                                'meeting_id' => $meeting_id
                            ]);
                
            }
            
            
            Session::flash('meeting_msg', 'Updated Successfully!'); 
            return redirect('admin/meeting_list');
        }
    }
    
    public function MeetingDelete($id){
        
        $meeting = meeting::find($id);
        $question_table_check = DB::table('questions')->where('meeting_id', $meeting->id)->get();
        
        if(count($question_table_check) > 0){
            $meetings = meeting::all();
            Session::forget('delete_success');
            Session::flash('question_dependency', 'First delete that question which depends on this meeting!'); 
            
            $meetings = meeting::paginate(10);
            return view('meeting_list', compact('meetings'));
        }else{
            $agenda_data = DB::table('agendas')->where('meeting_id', $meeting->id)->delete();
            $meeting->delete();
            $meetings = meeting::all();
            Session::forget('question_dependency');
            Session::flash('delete_success', 'Deleted Successfully!'); 
            $meetings = meeting::paginate(10);
            return view('meeting_list', compact('meetings'));
        }
        
        
    }
    
}
