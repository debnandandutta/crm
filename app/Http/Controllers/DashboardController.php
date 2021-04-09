<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $departments = Department::all();
        $regions = Region::all();
$chart_options = [
        'chart_title' => 'Day Wise Case',
        'report_type' => 'group_by_date',
        'model' => 'App\Enquiry',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
       
		'conditions'            => [
        ['name' => 'Case', 'condition' => 'preferrence = 0', 'color' => 'black'],
        ['name' => 'Ticket', 'condition' => 'preferrence = 1', 'color' => 'blue'],
    ],
		'filter_field' => 'created_at',
        'filter_days' => 300, // show only last 30 days
    ];

    $chart1 = new LaravelChart($chart_options);
        return view('dashboard.index', compact('departments','regions','chart1'));
    }

    public function getDepartmentData(Request $request)
    {
        $data = Department::query();

        return DataTables::of($data)
            ->addColumn('total_cases', function ($data){
                $ticketRoute = route('departmentCases', $data->id);
                return '<a href="'.$ticketRoute.'">'.$data->enquiry->count().'</a>';
            })
            ->addColumn('total_tickets', function ($data){
                $ticketRoute = route('departmentTickets', $data->id);
                return '<a href="'.$ticketRoute.'">'.$data->ticket->count().'</a>';
            })->addColumn('total_kb', function ($data){
                $kbRoute = route('Knowledge.categoryPost', $data->id);
                return '<a href="'.$kbRoute.'" target="_blank">'.$data->knowledgeBase->count().'</a>';
            })
            ->addColumn('action', function ($data) {

                $value = '<button type="button" class="btn btn-primary btn-sm" id="getEditDepartmentData" data-id="'.$data->id.'" title="Edit"><i class="fa fa-edit"></i></button>
                           <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteProductModal" class="btn btn-danger btn-sm" id="getDeleteId" title="Delete"><i class="la la-trash-o"></i></button>
                        ';

                return $value;
            })
            ->rawColumns(['total_cases','total_tickets','total_kb','ticket_title','action','ticket_status'])->make(true);
    }
}
