<?php

// login route

Route::get('/', function () {
    return view('login');
});

Route::post('login_match', 'LoginController@MatchData');
Route::get('logout', 'LoginController@Logout');

// admin route

Route::group(['prefix' => 'admin', 'middleware' => 'SuperAdmin'], function () {

    Route::get('/meeting', function () {
        return view('index');
    });
    
    Route::get('/dashboard', function () {
        return view('index');
    });
    
    Route::get('meeting_data','QuestionController@MeetingData');
    
    Route::get('agenda_data','QuestionController@AgendaData');


    Route::get('/meeting_list', function () {
        return view('meeting_list');
    });

    Route::get('meeting_edit/{id}', 'MeetingController@MeetingEdit');

    Route::get('/meeting_delete/{id}', 'MeetingController@MeetingDelete');

    Route::post('post_meeting', 'MeetingController@InsertMeeting');

    Route::get('meeting_list', 'MeetingController@MeetingView');

    Route::post('update_meeting', 'MeetingController@UpdateMeeting');

    //--------User Registration Form----------//
     Route::get('/admin_create','UserController@AdminCreate');
   
    //------User List---------//
    Route::get('/user_list', 'UserController@UserListShow');
    
     //--------User Registration Data Insertion----------//
    Route::post('/user_data_insert', 'UserController@UserDataInsert');
    
      //--------User Registration Data Edit----------//
    Route::get('/edit_user/{id}', 'UserController@UserDataEdit');
    
     //--------User Registration Data Update----------//
    Route::post('/update_user', 'UserController@UserDataUpdate');

   //--------User Registration Data Delete----------//
    Route::get('/delete_user/{id}', 'UserController@UserDataDelete');
    
    //----Charts Test------------------------------//
     Route::get('/chart_data/{ques_id}', 'QuestionController@ChartDataGet');

    Route::get('/create_question','QuestionController@CreateQuestion');

    Route::get('/mind_share', 'MindshareController@MindshareView');
    Route::get('/mind_share_publish/{id}', 'MindshareController@MindsharePublish');
    Route::get('/mind_share_unpublish/{id}', 'MindshareController@MindshareUnpublish');
    Route::get('/list', 'QuestionController@QuestionList');
    Route::get('/phonebook', 'PhonebookController@IdentityView');
    Route::get('result_view/{question_type_id}/{question_id}', 'QuestionController@ResultView');
    Route::post('single_question', 'QuestionController@SingleInsert');
    Route::post('multiple_question', 'QuestionController@MultipleInsert');
    Route::post('multi_select', 'QuestionController@MultiSelect');
    Route::get('publish_question/{id}', 'QuestionController@PublishQuestion');
    Route::get('reply_sink/{id}','QuestionController@AutoSink');
    
});


// developer admin


Route::group(['prefix' => 'developer', 'middleware' => 'DeveloperAdmin'], function () {
    Route::get('/dashboard', function () {
        return view('developer_admin/company_registration');
    });
    
    // Company Registration detail


    Route::get('/company_view','DeveloperController@ViewCompanys');
    Route::get('/company_registration','DeveloperController@CompanyRegisterView');
    Route::post('registration', 'DeveloperController@CompanyRegistration');    
    Route::get('/company_edit/{id}','DeveloperController@CompanyDataEdit');
    Route::post('company_update', 'DeveloperController@CompanyDataUpdate');
    Route::get('company_delete/{id}', 'DeveloperController@CompanyDataDelete');
    

    // user registration detail
    Route::get('/user_registration_view','DeveloperController@UserRegisterView');
    Route::get('/user_view','DeveloperController@ViewUser');
    Route::post('user_registration', 'DeveloperController@UserRegistration');
    Route::get('/user_edit/{id}','DeveloperController@UserDataEdit');
    Route::post('user_update', 'DeveloperController@UserDataUpdate');
    Route::get('user_delete/{id}', 'DeveloperController@UserDataDelete');
    
    // department route
    Route::get('/department_view','DeveloperController@DepartmentView');
    Route::post('/department_add','DeveloperController@DepartmentPost');
    Route::get('/department_edit/{id}','DeveloperController@DepartmentEdit');
    Route::post('/department_update','DeveloperController@DepartmentUpdate');
    Route::get('department_delete/{id}','DeveloperController@DepartmentDelete');
});
