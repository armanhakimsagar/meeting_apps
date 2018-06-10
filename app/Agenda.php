<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
  protected $fillable = ['agenda_name', 'speaker','room','meeting_id'];
}
