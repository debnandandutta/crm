<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $notify = Notification::orderBy('id', 'DESC')
                    ->join('users','notifications.activity_id','=','users.id')
                    ->join('tickets', 'notifications.ticket_id', '=', 'tickets.id')
                    ->select('notifications.*','users.name','tickets.title', 'tickets.ticket_id as ticket_code')
                    ->get();

        foreach ($notify as $key => $noti){
            $notifyToArray = array_map('intval', explode(',', $noti->notify_to));
            if(!in_array($user,$notifyToArray))
            {
                unset($notify[$key]);
            }
        }
    
        return $notify;
    }

    public function allNotification()
    {
        $user = Auth::user()->id;
        $notifications = Notification::orderBy('id', 'DESC')
                    ->join('users','notifications.activity_id','=','users.id')
                    ->join('tickets', 'notifications.ticket_id', '=', 'tickets.id')
                    ->join('departments', 'tickets.department_id', '=', 'departments.id')
                    ->select('notifications.*','users.name','tickets.title', 'tickets.ticket_id as ticket_code','departments.title as department')
                    ->paginate();
        
        foreach ($notifications as $key => $noti){
            $notifyToArray = array_map('intval', explode(',', $noti->notify_to));
            if(!in_array($user,$notifyToArray))
            {
                unset($notifications[$key]);
            }
        }

        return view('notification.index', compact('notifications'));
    }

    public function update(Request $request, $id)
    {
        $notifcations = Notification::find($id);

        if(!in_array(Auth::user()->id,explode(',',$notifcations->read_by))  )
        {
            $notifcations->read_by = $notifcations->read_by. ',' .$request->read_by;


            $notifcations->save();

            return  response()->json(['success'=> true, 'success'=> Lang::get('lang.notification_open')]);

        }
        else{
            return  response()->json(['success'=> false, 'errors'=> 'Error']);
        }
        $notifcations->save();
    }

    public function count()
    {
        $count = 0;
        $notifcations = Notification::all();
        $notification_check_time = User::select('notification_check')->where('id',Auth::user()->id)->first();

        foreach($notifcations as $noti)
        {
            if(!in_array(Auth::user()->id,explode(',',$noti->read_by)) && in_array(Auth::user()->id,explode(',',$noti->notify_to)) && $notification_check_time->notification_check < $noti->updated_at)
            {
                $count++;
            }
        }

        return $count;
    }

    public function countUp($id)
    {
        $time = date('Y-m-d H:i:s');
        $updated = User::where('id',$id)->update(['notification_check'=>$time]);
        if ($updated) {
            return response()->json('success', 200);
        }

    }
}
