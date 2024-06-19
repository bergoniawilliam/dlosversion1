<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ApproveApplicant extends Model
{
    protected $table = 'approve_app_data';
    protected $fillable = [
            'id', 
            'rank' ,
            'first_name' ,
            'middle_name', 
            'last_name',
            'qlr' ,
            'badge_number',
            'unit',
            'purpose' ,
            'specific_purpose' ,
            'email', 
            'contact_number' ,
            'status',
            'ctrl_no', 
            'create_at', 
            'reason', 
            'updated_at'
            
    ];

     
}
