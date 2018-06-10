<?php

use Illuminate\Http\Request;
Use App\agenda;
Use App\meeting;
Use App\mind_share;
Use App\question_reply;
Use App\question_type;
Use App\registration;
Use App\department;
Use App\company;
Use App\blood_group;



// department api

Route::get('departments', function() {
    
    $department = department::all();
    if(count($department) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $department
        ]; 
    }
    
    return $feedback;
    
});

Route::get('departments/{id}', function($id) {
    
    $department = agenda::find($id);
    if(count($department) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $department
        ]; 
    }
    
    return $feedback;
    
});

Route::post('departments', function(Request $request) {
    $department = department::create($request->all);
    
    if(count($department) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});






Route::get('companies', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $company = company::all();
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
});

Route::get('companies/{id}', function($id) {
    
    $company = company::find($id);
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
    
});

Route::post('companies', function(Request $request) {
    $company = company::create($request->all);
    
    if(count($company) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});




Route::get('agendas', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    $agenda = agenda::all();
    if(count($agenda) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $agenda
        ]; 
    }
    
    return $feedback;
});

Route::get('agendas/{id}', function($id) {
    
    $agenda = agenda::find($id);
    if(count($agenda) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $agenda
        ]; 
    }
    
    return $feedback;
    
});

Route::post('agendas', function(Request $request) {
    $agenda = agenda::create($request->all);
    
    if(count($agenda) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});





Route::get('meetings', function() {
    
    $meeting = meeting::all();
    if(count($meeting) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $meeting
        ]; 
    }
    
    return $feedback;
});

Route::get('meetings/{id}', function($id) {
    $meeting = meeting::find($id);
    if(count($meeting) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $meeting
        ]; 
    }
    
    return $feedback;
});

Route::post('meetings', function(Request $request) {
    
    $meeting = meeting::create($request->all);
    
    if(count($meeting) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});


Route::get('mind_shares', function() {
    
    $mind_share = mind_share::all();
    if(count($mind_share) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $mind_share
        ]; 
    }
    
    return $feedback;
});


Route::get('mind_shares/{id}', function($id) {
    $mind_share = mind_share::find($id);
    if(count($mind_share) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $mind_share
        ]; 
    }
    
    return $feedback;
});



Route::post('mind_shares', function(Request $request) {
    $mind_share = mind_share::create($request->all);
    if(count($mind_share) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "Insert not successfull",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "Insert successfully"
        ]; 
    }
    
    return $feedback;
});




Route::get('question_replies', function() {
    $question_reply = question_reply::all();
    if(count($question_reply) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $question_reply
        ]; 
    }
    
    return $feedback;
});

Route::get('question_replies/{id}', function($id) {
    
    $question_reply = question_reply::find($id);
    if(count($question_reply) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $question_reply
        ]; 
    }
    
    return $feedback;
    
});

Route::post('question_replies', function(Request $request) {
    $question_reply = question_reply::create($request->all);
    
    if(count($question_reply) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});





Route::get('question_types', function() {
    $question_type = question_type::all();
    if(count($question_type) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $question_type
        ]; 
    }
    
    return $feedback;
});


Route::get('signin/{username}/{password}','LoginController@SignIn');


Route::post('signup', function(Request $request) {
    $registration = registration::create($request->all);
    
    if(count($registration) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});





Route::post('question_options', function(Request $request) {
    $question_options = question_option::create($request->all);
    
    if(count($question_options) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "insert error"
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "inserted successfully"
        ]; 
    }
    
    return $feedback;
});




Route::get('question_options', function() {
    $question_options = question_option::all();
    if(count($question_options) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $question_options
        ]; 
    }
    
    return $feedback;
});



Route::get('blood_groups', function() {
    $blood_group = blood_group::all();
    if(count($blood_group) == 0){
       $feedback = [
           'status'     => "error",
           'message'    => "data not found",
           'data'       => null
        ]; 
       
    }else{
        $feedback = [
           'status'     => "success",
           'message'    => "data found",
           'data'       => $blood_group
        ]; 
    }
    
    return $feedback;
});


Route::get('contacts','LoginController@Contacts');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
