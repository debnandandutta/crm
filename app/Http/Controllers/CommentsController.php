<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Models\Comment;
use App\Models\Ticket;
use App\Traits\EmailTrait;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    use EmailTrait;

    public function postComment(Request $request, AppMailer $mailer)
	{
	    $this->validate($request, [
	        'comment'   => 'required'
	    ]);

	    $ticketId = $request->input('enquiry_id');
	    $comment = $request->input('comment');
	    $status = $request->input('status');

        $comment = Comment::create([
            'enquiry_id' => $ticketId,
            'user_id'   => Auth::user()->id,
            'comment'   => $comment,
        ]);
        $ticket = Enquiry::find($ticketId);
        if ($status == 'Closed'){
            $ticket->update(['status' => 'Closed']);
        }
        /*
                $ticketOwner = $comment->enquiry->user;
                $authUser = Auth::user();
                $subject = "RE: $ticket->title (Ticket ID: $ticket->enquiry_id)";

                // send mail if the user commenting is not the ticket owner
                if ($comment->enquiry->user->id !== $authUser->id) {
                    $mailText = $this->commentTemplate($authUser, $ticket,$subject, $comment);
                    $mailer->sendEmail($mailText, $ticketOwner->email,$subject);
                }
        */
        $notify = updateNotify('Your comment has been submitted');

        return redirect()->back()->with($notify);
	}
}
