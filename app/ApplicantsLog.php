<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ApplicantsLog extends Model
{
    protected $table = 'applicants_logs';

    public static function record($userid,$action,$details){
        date_default_timezone_set('Asia/Manila');
    	$new = new self();
    	$new->applicant_id = $userid;
    	$new->action = $action;
    	$new->details = $details;
        $new->ip_address = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        $new->created_by = $userid;
    	$new->created_at = now();
    	$new->save();
    }

}
