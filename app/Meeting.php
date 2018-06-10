<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
   protected $fillable =['title','description','start_time','end_time','code','location','presenter'];
}
