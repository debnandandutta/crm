<?php

namespace App\Widgets;

use App\Enquiry;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Department;
use App\Models\KnowledgeBase;
use App\Models\Ticket;
use App\User;
use App\Models\Vote;

class DasboardCounterStatus extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = [];
        $ticktes = Enquiry::all();
        $countUser = User::where('user_type',0)->where('is_admin',0)->count();
        $countStaff = User::where('user_type',1)->where('is_admin',0)->count();
        $allCase = Enquiry::where('preferrence',0)->count();
        $allTicket = Enquiry::where('preferrence',1)->count();

        $openCases = $ticktes->where('preferrence',0)->where('status','open')->count();
        $openTickets = $ticktes->where('preferrence',1)->where('status','open')->count();

        $closeCases = $ticktes->where('preferrence',0)->where('status','closed')->count();
        $closeTickets = $ticktes->where('preferrence',1)->where('status','closed')->count();

        $countDept = Department::count();
        $countKB = KnowledgeBase::count();



        $totalTicket = $ticktes->count();


        $vote = Vote::where('satisfied')->count();

        $count = [
            'countUser' => $countUser,
            'countStaff' => $countStaff,
            'countDept' => $countDept,
            'countKB' => $countKB,
            'totalTicket' => $totalTicket,
            'openTickets' => $openTickets,
            'openCases' => $openCases,
            'closeCases' => $closeCases,
            'closeTickets' => $closeTickets,
            'vote' => $vote,
            'allCase' => $allCase,
            'allTicket' => $allTicket,

        ];

        return view('widgets.dasboard_counter_status', [
            'count' => $count,
        ]);
    }
}
