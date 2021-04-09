<?php
namespace App\Mailers;

use App\Models\GeneralSetting;
use App\Models\Ticket;
use App\Traits\EmailTrait;
use Config;
use Illuminate\Support\Facades\Mail;

class AppMailer {

    use EmailTrait;

    /*protected $mailer; 
    protected $fromAddress = 'support@supportticket.dev';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];*/

    public function sendEmail($mailText,$email,$subject)
    {
        $setting = GeneralSetting::first();

        if ($setting->mail_driver && $setting->from_email) {
            Config::set('mail.username', $setting->smtp_username);
            Config::set('mail.password', $setting->smtp_password);
            Config::set('mail.host', $setting->smtp_host);
            Config::set('mail.driver', $setting->mail_driver);
            Config::set('mail.port', $setting->smtp_port);
            Config::set('mail.encryption', $setting->encryption);
            Config::set('mail.from.address', $setting->from_email);
            Config::set('mail.from.name', $setting->from_name);

            Mail::send([], [], function ($message) use ($email, $subject, $mailText) {
                $message->to($email)->subject($subject)->setBody($mailText, 'text/html');
            });

            return true;
        } else {
            return false;
        }
    }

    /*public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        $this->view = 'emails.ticket_info';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {

        $subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";

        $mailText = $this->commentTemplate($user, $ticket, $comment, $subject);

        $this->to = $ticketOwner->email;
        $this->subject = $subject;
        $this->view = 'emails.template';
        $this->data = compact('mailText');

        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title(Ticket ID: $ticket->ticket_id)";
        $this->view = 'emails.template';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }

    public function sendResetLinkEmailNotification($token, $email)
    {
        $subject = "Reset Password";

        $mailText = $this->resetPasswordTemplate($token);

        $this->to = $email;
        $this->subject = $subject;
        $this->view = 'emails.template';
        $this->data = compact('mailText');

        return $this->deliver();
    }

    public function passwordChangedNotification($email)
    {
        $mailText = $this->passwordChangedTemplate();

        $this->to = $email;
        $this->subject = 'Password Changed Successfully';
        $this->view = 'emails.template';
        $this->data = compact('mailText');

        return $this->deliver();
    }*/
}