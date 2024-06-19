<?php

namespace App\Http\Controllers;
use App\Transaction;


use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactionview= Transaction::all();
        return view('modaltransaction')
                ->with ('transactionview', $transactionview);
    }

    public function store(Request $r)
    {
        $new = new Transaction();
        $new->transactid = $r->transactid;
        $new->status=$r->status;
        $new->remarks=$r->chassisnumber;
        $new->userid=$r->userid;
        $new->motorid=$r->motorid;
        $new->date_released=$r->date_released;
        $new->date_submitted=$r->date_submitted;
        $new->clientid=$r->clientid;
        $new->save();
        return 'Succesfully Saved';
    }

    public function show($id)
    {
        $response = Transaction::where('transactid',$id)->get();
        return $response;
    }


    public function update(Request $request)
    {
        //use the name of the textbox at modal
        $response = Transaction::where('transactid',$request->mod_transactid)->update([
            'transactid'=>$request->transactid,
            'status'=>$request->status,
            'remarks'=>$request->remarks,
            //make user connection
            'userid'=>$request->userid,
            'motorid'=>$request->motorid,
            'date_released'=>$request->date_released,
            'date_submitted'=>$request->date_submitted,
            //make applicant connection
            'clientid'=>$request->clientid,
        ]);
        return "Successfully Updated";
    }

    public function destroy($id)
    {
        Transaction::where('transactid',$id)->delete();
        return 'Successfully Deleted';
    }

    public function transact(Request $r){
    
           $newData = array(); $i=0;
           $totalFiltered = 0;
           $totalRecords = Transaction::count();
           $transactid=$r->transactid;
           $status=$r->status;
           $remarks=$r->remarks;
           $userid=$r->userid;
           $motorid=$r->motorid;
           $date_released=$r->date_released;
           $date_submitted=$r->date_submitted;
           $clientid=$r->clientid;
          
           if($r->input('draw') > 1){
     
               $start  = $r->input('start');
               $limit  = $r->input('length');
   
               $keywords = $r->input('search.value');
               $data = Transaction::when($transactid != '', function ($query) use ($transactid) {
                                     return $query->where(function($query) use ($transactid){
                                         $query->where('transactid','LIKE','%'.$transactid.'%');
                                     });
                                   })
                                   ->when($status != '', function ($query) use ($status) {
                                     return $query->where(function($query) use ($status){
                                         $query->where('status','LIKE','%'.$status.'%');
                                     });
                                   })
                                   ->when($remarks != '',function($query) use ($remarks){
                                    return $query->where(function($query) use ($remarks){
                                        $query->where('remarks','LIKE','%'.$remarks.'%');
                                     });
                                   })
                                   ->when($userid!= '', function ($query) use ($userid) {
                                     return $query->where(function($query) use ($userid){
                                         $query->where('$userid','LIKE','%'.$$userid.'%');
                                     });
                                   })
                                   ->when($motorid != '', function ($query) use ($motorid) {
                                     return $query->where(function($query) use ($motorid){
                                         $query->where('motorid','LIKE','%'.$motorid.'%');
                                     });
                                   })
                                   ->when($date_released != '', function ($query) use ($date_released) {
                                     return $query->where(function($query) use ($date_released){
                                         $query->where('date_released','LIKE','%'.$date_released.'%');
                                     });
                                   })
                                   ->when($date_submitted != '', function ($query) use ($date_submitted) {
                                    return $query->where(function($query) use ($date_submitted){
                                        $query->where('date_submitted','LIKE','%'.$date_submitted.'%');
                                    });
                                  })
                                  ->when($clientid != '', function ($query) use ($clientid) {
                                    return $query->where(function($query) use ($clientid){
                                        $query->where('clientid','LIKE','%'.$clientid.'%');
                                    });
                                  })
                                   ->skip($start)->take($limit)
                                   ->orderBy('transactid')->get();
     
               $totalFiltered = $totalRecords;
     
           }else{
             if($r->input('length') < $totalRecords) $toDisplay = $r->input('length');
               else $toDisplay = $totalRecords;
               $totalFiltered = $totalRecords;
               $data =  Transaction::take($toDisplay)
                       ->orderBy('transactid')->get();
           }
     
           foreach ($data as $d):
     
            // $data =  Transactions::where('stationid',Auth::user()->station)->take($toDisplay)
            //            ->orderBy('plateNumber')->get();

            // if(Auth::user()->user_type == 1){

            // }
     
               $btns = '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
                           <ul class="dropdown-menu">';
               $btns .= '  <li><a class="update_motor" data-transactid="'.$d->transactid.'"  data-status="'.$d->status.'" 
                                                 data-remarks="'.$d->remarks.'" data-userid="'.$d->userid.'"
                                                 data-motorid="'.$d->motorid.'" data-date_released="'.$d->date_released.'"
                                                 data-date_submitted="'.$d->date_submitted.'" data-clientid="'.$d->clientid.'">Update</a></li>';
               $btns .= '  <li><a class="delete" data-transactid="'.$d->transactid.'"  data-status="'.$d->status.'" 
                                                data-remarks="'.$d->remarks.'" data-userid="'.$d->userid.'"
                                                data-motorid="'.$d->motorid.'" data-date_released="'.$d->date_released.'"
                                                data-date_submitted="'.$d->date_submitted.'" data-clientid="'.$d->clientid.'">Deactivate</a></li>';
               $btns .= '   </ul>';
               
            //    if(!empty($d->motorcycleImg)){
            //         $btns .= '<a class="btn btn-success" href="'.asset('/storage/testimage/'.$d->motorcycleImg).'" target="_blank">
            //                     View Image
            //                   </a>';
            //    }


     //this will fill the data table
               $newData[$i] = array(
                     'no'=>$i+1+$r->input('start'),
                     "motorcycleId"=>$d->transactid,
                     "status"=>$d->status,
                     "remarks"=>$d->remarks,
                     "userid"=>$d->userid,
                     "motorid"=>$d->motorid,
                     "date_released"=>$d->date_released,
                     "date_submitted"=>$d->date_submitted,
                     "clientid"=>$d->clientid,
                     "action"=>$btns
                   );
               $i++;
             endforeach;
             $response = array(
                 "draw" => intval($r->input('draw')),
                 "recordsTotal" => $totalRecords,
                 "recordsFiltered" => $totalFiltered,
                 "data" => $newData
              );
           return response()->json($response);
         }

}
