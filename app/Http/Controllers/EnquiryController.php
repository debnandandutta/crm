<?php

namespace App\Http\Controllers;

use App\Area;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Item;
use App\Mailers\AppMailer;
use App\Manager;
use App\Models\Department;
use App\Models\Ticket;
use App\Traits\EmailTrait;
use App\Region;
use App\Territory;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EnquiryController extends Controller
{
    use EmailTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        date_default_timezone_set('Asia/Dhaka');
        //$token = $this->geraHash(3).date('ymdHi');
        $token = $this->geraHash(6);

        $regions = Region::all();
        $brands = Department::all();
        $callType = Item::where('type', 1)->get();
        $complainType = Item::where('type', 2)->get();

        return view('case.create', compact('regions','callType','complainType','brands','token'));
    }

    public function getAreaDisplay(Request $request){
        if (!$request->regionId) {
            $html = '<option value="">--No Area--</option>';
        } else {
            $html = '<option value="">--Select Area--</option>';
            $categories = Area::where('regionId', $request->regionId)->get();
            if(empty($categories)){
                $html .= '<option value="">--Select Area--</option>';
            }else{
                foreach ($categories as $category) {

                    $html .= '<option data-area="'.$category->areaName.'" value="'.$category->id.'">'.$category->areaName.'</option>';
                }
            }

        }

        return response()->json(['html' => $html]);
    }
    public function getTerritoryDisplay(Request $request){
        if (!$request->areaId) {
            $html = '<option value="">--No Area--</option>';
        } else {
            $html = '<option value="">--Select Territory--</option>';
            $categories = Territory::where('areaId', $request->areaId)->get();
            if(empty($categories)){
                $html .= '<option value="">--Select Territory--</option>';
            }else{
                foreach ($categories as $category) {

                    $html .= '<option data-territory="'.$category->territoryName.'" value="'.$category->id.'">'.$category->territoryName.'</option>';
                }
            }

        }

        return response()->json(['html' => $html]);
    }
    public function getTownDisplay(Request $request){
        if (!$request->territoryId) {
            $html = '<option value="">--No Town--</option>';
        } else {
            $html = '<option value="">--Select Town--</option>';
            $categories = Town::where('territoryId', $request->territoryId)->get();
            if(empty($categories)){
                $html .= '<option value="">--Select Town--</option>';
            }else{
                foreach ($categories as $category) {

                    $html .= '<option data-town="'.$category->townName.'" value="'.$category->id.'">'.$category->townName.'</option>';
                }
            }

        }

        return response()->json(['html' => $html]);
    }

    public function getTmInfo(Request $request){
        if (!$request->territoryId) {
            $html = '';
        } else {
            $territory = Manager::where('territoryId', $request->territoryId)->first();
            $area = Area::where('id', $territory->areaId)->first();
            $region = Region::where('id', $territory->regionId)->first();
            $html = '<input type="hidden" class="form-control" name="tm" id="tm" value="'.$territory->id.'"><p> Distributer Name :'.$territory->name.'</p>';
            $html .='<p>Area: '.$area->areaName.'</p>';
            $html .='<p>Region: '.$region->title.'</p>';
        }

        return response()->json(['html' => $html]);
    }
    function geraHash($qtd){

        //$caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $caracteres = '0123456789';
        $quantidadeCaracteres = strlen($caracteres);
        $quantidadeCaracteres--;

        $Hash=NULL;
        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$quantidadeCaracteres);
            $Hash .= substr($caracteres,$Posicao,1);
        }

        return $Hash;
    }

    public function saveEnquiry(Request $request, AppMailer $mailer){

        date_default_timezone_set('Asia/Dhaka');

        $enquiry_id = $request->enquiry_id;
        $name = $request->callerName;
        $shop = $request->shopName;
        $mobileOne = $request->mobileOne;
        $mobileTwo = $request->mobileTwo;
        $address = $request->address;
        $brand = $request->department_id;
        $region_id = $request->region;
        $area = $request->area;
        $territory = $request->territory;
        $town = $request->town;
        $expiry= $request->expiry;
        $tm= $request->tm;
        $callerType= $request->callerType;
        $description= $request->description;
        $callType= $request->callType;
        $complainType= $request->complainType;
        $storeType= $request->store;
        $dsr_name= $request->dsrName;
        $preferrence= $request->preferrence;
        $status= $request->status;

        $authUser = Auth::user();

        $saved = Enquiry::create([
            'user_id' => Auth::id(),
            'department_id' => $brand,
            'enquiry_id' => $enquiry_id,
            'title' => $name,
            'shop' => $shop,
            'mobileOne' => $mobileOne,
            'mobileTwo' => $mobileTwo,
            'address' => $address,
            'region_id' => $region_id,
            'area' => $area,
            'territory' => $territory,
            'town' => $town,
            'expiry' => $expiry,
            'tm' => $tm,
            'description' => $description,
            'callerType' => $callerType,
            'callType' => $callType,
            'complainType' => $complainType,
            'storeType' => $storeType,
            'dsr_name' => $dsr_name,
            'preferrence' => $preferrence,
            'status' => $status,
        ]);

        if ($saved) {
            $notify = storeNotify('Case Added');
        }else{
            $notify = errorNotify('Case Could Not add');
        }

          if($preferrence==1){
              $mailText = $this->newTicketSubmitTemplate($authUser,$enquiry_id,'High', $status);
              $subject = "[Ticket ID: $enquiry_id] $name";
              $mailer->sendEmail($mailText,"debnandandutta@gmail.com",$subject);
              $mailer->sendEmail($mailText,"kamrulhasan.jti@getco-bsl.net",$subject);
              $mailer->sendEmail($mailText,"robin@getco-bsl.net",$subject);
              $mailer->sendEmail($mailText,"saydur@getco-bsl.net",$subject);

          }


        return redirect()->back()->with($notify);
    }

    public function updateEnquiry(Request $request){

        date_default_timezone_set('Asia/Dhaka');
        $enquiry = Enquiry::where('enquiry_id', $request->enquiry_id)->firstOrFail();

        $enquiry->title = $request->callerName;
        $enquiry->shop = $request->shopName;
        $enquiry->mobileOne = $request->mobileOne;
        $enquiry->mobileTwo = $request->mobileTwo;
        $enquiry->address = $request->address;
        $enquiry->department_id = $request->department_id;
        $enquiry->region_id = $request->region;
        $enquiry->area = $request->area;
        $enquiry->territory = $request->territory;
        $enquiry->town = $request->town;
        $enquiry->expiry= $request->expiry;
        $enquiry->tm= $request->tm;
        $enquiry->callerType= $request->callerType;
        $enquiry->description= $request->description;
        $enquiry->callType= $request->callType;
        $enquiry->complainType= $request->complainType;
        $enquiry->storeType= $request->store;
        $enquiry->dsr_name= $request->dsrName;
        $enquiry->preferrence= $request->preferrence;
        $enquiry->status= $request->status;



        if ($enquiry->save()) {
            $notify = storeNotify(' Updated');
        }else{
            $notify = errorNotify('Could Not Update');
        }



        return redirect()->back()->with($notify);
    }




    public function index()
    {
        $departments = Department::all();
        $preference =0;
        return view('case.index', compact('departments','preference'));
    }
    public function ticketIndex(){
        $departments = Department::all();
        $preference =1;
        return view('case.index', compact('departments','preference'));
    }

   public function getEnquiryData(Request $request)
    {
        $user = Auth::user();
        $data = Enquiry::query()->where('preferrence', $request->preference);
        
       /* if ($user->is_admin){
            $data = Enquiry::query()->where('preferrence', $request->preference);
        }else if ($user->user_type == 1){
            $data = Enquiry::where('department_id', $user->department_id);
        }else{
            $data = Enquiry::where('user_id',$user->id);
        }*/


            return Datatables::of($data->when($request->ticketType != 'all', function ($q) use($request){
                $q->where('status',$request->ticketType);
            } ))
            ->filter( function ($query) use ($request, $user){

                $search = $request->search['value'];

                if (($request->has('startDate')) && ($request->has('endDate'))) {
                    $query->whereBetween(DB::raw('DATE(created_at)'), [$request->startDate, $request->endDate]);
                }
                if (($request->has('ticketDepartment')) && ($request->ticketDepartment !='all')){
                    $query->where('department_id', $request->ticketDepartment);
                }
                if($request->has('search') && $user->type == 0 && $user->is_admin == 0){
                    $query
                        ->Where('enquiry_id', 'LIKE', "%$search%");
                }else{
                    if ($request->has('search') && $search != null){
                        $query->where('title', 'LIKE', "%$search%")
                            ->orWhere('enquiry_id', 'LIKE', "%$search%");

                    }
                }

            })

            ->addColumn('action', function ($data) use($user) {
                $closeRoute = route('close_ticket.close', $data->enquiry_id);
                $viewRoute = route('enquiry.show', $data->enquiry_id);
                $editRoute = route('enquiry.edit', $data->enquiry_id);
                $reopenRoute = route('ticketReOpen', $data->enquiry_id);
                $assign = '';
                $reopen = '';
                if ($user->is_admin){
                    $assign = '<button type="button" class="badge bg-info pointer" id="getAssignedTicketData" data-id="'.$data->id.'" title="Re-Assign Department">'.__('lang.reassign').'</button>';
                    $reopen = '<form action="' . $reopenRoute . '" method="post" id="reopen_form_' . $data->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button title="Reopen Ticket" type="submit"  class="badge bg-red pointer" data-id="reopen_form_' . $data->id . '">'.__("lang.reopen").'</button>
                                </form>';
                }

                if ($data->status === "open") {
                    $value = '<a href="' . $viewRoute . '"
                                   class="badge bg-primary text-white" title="Reply">'.__("lang.reply").'</a>
                                   <a href="' . $editRoute . '"
                                   class="badge bg-primary text-white" title="Edit">'.__("lang.edit").'</a>
                               <form action="' . $closeRoute . '" method="post" id="close_form_' . $data->id . '">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button title="Close" type="submit"  class="badge bg-red pointer" data-id="close_form_' . $data->id . '">'.__("lang.close").'</button>
                            </form>
                            '.$assign;
                } else {
                    $value = $reopen;
                }

                return $value;
            })
            ->addColumn('ticket_title', function ($data) {
                $ticketRoute = route('enquiry.show', $data->enquiry_id);
                $val = '<a target="_blank" href="' . $ticketRoute . '">'.$data->title.'</a>';
                return $val;
            })
            ->addColumn('department', function ($data) {
                return optional($data->department)->title;
            })
            ->addColumn('user_name', function ($data) {
                return optional($data->user)->name;
            })
            ->addColumn('updated', function ($data) {
                return $data->updated_at->format('Y m d, h:i A');
            })
            ->rawColumns(['ticket_title','action','ticket_status'])->make(true);
    }


    public function getEnquiryDatas(Request $request)
    {
        $user = Auth::user();

        if ($user->is_admin){
            $data = Enquiry::query();
        }else if ($user->user_type == 1){
            $data = Enquiry::where('department_id', $user->department_id);
        }else{
            $data = Enquiry::where('user_id',$user->id);
        }

        return Datatables::of($data->when($request->ticketType != 'all', function ($q) use($request){
            $q->where('status',$request->ticketType);
        } ))
            ->filter( function ($query) use ($request, $user){
                $search = $request->search['value'];
                if (($request->has('startDate')) && ($request->has('endDate'))) {
                    $query->whereBetween(DB::raw('DATE(created_at)'), [$request->startDate, $request->endDate]);
                }
                if (($request->has('ticketDepartment')) && ($request->ticketDepartment !='all')){
                    $query->where('department_id', $request->ticketDepartment);
                }

                if($request->has('search') && $user->type == 0 && $user->is_admin == 0){
                    $query->where('user_id', $user->id)
                        ->Where('ticket_id', 'LIKE', "%$search%");
                }else{
                    if ($request->has('search') && $search != null){
                        $query->where('title', 'LIKE', "%$search%")
                            ->orWhere('ticket_id', 'LIKE', "%$search%");

                    }
                }
            })
            ->addColumn('ticket_title', function ($data) {
                $ticketRoute = route('ticket.show', $data->ticket_id);
                $val = '<a href="' . $ticketRoute . '">'.$data->title.'</a>';
                return $val;
            })
            ->addColumn('department', function ($data) {
                return $data->department->title;
            })
            ->addColumn('user_name', function ($data) {
                return optional($data->user)->name;
            })
            ->addColumn('ticket_status', function ($data) {
                if ($data->status === "Open") {
                    $statusValue = '<span class="badge badge-warning">'.$data->status.'</span>';
                } else {
                    $statusValue = '<span class="badge badge-success">'.$data->status.'</span>';
                }
                return $statusValue;
            })
            ->addColumn('updated', function ($data) {
                return $data->updated_at->format('Y m d, h:i A');
            })
            ->addColumn('action', function ($data) use($user) {
                $closeRoute = route('close_ticket.close', $data->ticket_id);
                $viewRoute = route('ticket.show', $data->ticket_id);
                $reopenRoute = route('ticketReOpen', $data->ticket_id);
                $assign = '';
                $reopen = '';
                if ($user->is_admin){
                    $assign = '<button type="button" class="badge bg-info pointer" id="getAssignedTicketData" data-id="'.$data->id.'" title="Re-Assign Department">'.__('lang.reassign').'</button>';
                    $reopen = '<form action="' . $reopenRoute . '" method="post" id="reopen_form_' . $data->id . '">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <button title="Reopen Ticket" type="submit"  class="badge bg-red pointer" data-id="reopen_form_' . $data->id . '">'.__("lang.reopen").'</button>
                                </form>';
                }

                if ($data->status === "Open") {
                    $value = '<a href="' . $viewRoute . '"
                                   class="badge bg-primary text-white" title="Reply">'.__("lang.reply").'</a>
                               <form action="' . $closeRoute . '" method="post" id="close_form_' . $data->id . '">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button title="Close" type="submit"  class="badge bg-red pointer" data-id="close_form_' . $data->id . '">'.__("lang.close").'</button>
                            </form>
                            '.$assign;
                } else {
                    $value = $reopen;
                }

                return $value;
            })
            ->rawColumns(['ticket_title','action','ticket_status'])->make(true);
    }


}
