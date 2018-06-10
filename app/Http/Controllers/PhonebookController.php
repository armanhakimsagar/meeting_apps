<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

class PhonebookController extends Controller
{
    public function IdentityView(){
        $registrations = registration::paginate(10);;
        return view('phonebook', compact('registrations'));
    }
}
