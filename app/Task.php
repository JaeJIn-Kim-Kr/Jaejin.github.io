<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Task extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['title','content','user_id','waste_Chk','reg_Date','mod_Date','complete_Date','progress_Chk','task_File'];
}
