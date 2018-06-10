<?php

    // get meeting id to name 

    function get_meeting_name($id){
        
        $results = DB::select( DB::raw("SELECT id,title FROM meetings WHERE id = '$id'") );
        
        foreach ($results as $result){
            return $result->title;
        }
    }
    
    
    // get username 

    function get_username($id){
        $results = DB::select( DB::raw("SELECT name FROM registrations WHERE id = '$id'") );
        foreach ($results as $result){
            echo $result->name;
        }
    }
    
    // get_userimage 

    function get_userimage($id){
        $results = DB::select( DB::raw("SELECT picture FROM registrations WHERE id = '$id'") );
        foreach ($results as $result){
            echo $result->picture;
        }
    }
    
    
    // get userid 

    function get_userid($name){
        $results = DB::select( DB::raw("SELECT id FROM registrations WHERE name = '$name'") );
        foreach ($results as $result){
            return $result->id;
        }
    }
    
    
    // get company id 

    function get_company_id($id){
        $results = DB::select( DB::raw("SELECT id FROM companies WHERE user_id = '$id'"));
        foreach ($results as $result){
            return $result->id;
        }
    }

    // get company id  

    function get_company_name($id){
        $results = DB::select( DB::raw("SELECT name FROM companies WHERE id = '$id'") );
        foreach ($results as $result){
            return $result->name;
        }
    }
    
     // get depertment id  

    function get_depertment_id($id){
        $results = DB::table("companies")
                ->select('department_id')
                ->where("parent_company",$id)
                ->get();
        
        $result = [];
        foreach ($results as $resultss){
            $result['department_id'][] = $resultss->department_id;
        }
        return $result;
    }
    
    
     // get depertment name  

    function get_depertment_details($id){
        $results = DB::table("departments")
                ->select('*')
                ->whereIn("id",[3,4])
                ->get();
        
        $result = [];
        foreach ($results as $resultss){
            $result[]   =   [
                'id'    =>$resultss->id,
                'name'  =>$resultss->name
            ];
        }
            
        
        return $result;
    }
    
?>

