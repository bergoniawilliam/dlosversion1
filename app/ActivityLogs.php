<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ActivityLogs extends Model
{
    protected $table = 'activity_logs';

    public static function record($userid,$action,$details){
        date_default_timezone_set('Asia/Manila');
    	$new = new self();
    	$new->user_id = $userid;
    	$new->action = $action;
    	$new->details = $details;
        $new->ip_address = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        $new->created_by = Auth::user()->id;
    	$new->created_at = now();
    	$new->save();
    }

}
