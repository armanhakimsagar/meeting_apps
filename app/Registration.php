<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable =['name','passwords','company_name','designation','email','department','phone','admin_role','picture'];
}
