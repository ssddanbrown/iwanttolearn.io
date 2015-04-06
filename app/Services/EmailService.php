<?php namespace Learn\Services;


use Illuminate\Mail\Mailer;
use Learn\Models\User;

class EmailService {

    protected $mail;
    protected $user;

    function __construct(Mailer $mail, User $user)
    {
        $this->mail = $mail;
        $this->user = $user;
    }


    public function sendAdminsNewFeedback($feedback)
    {
        $admins = $this->user->all();
        $adminEmails = [];
        foreach($admins as $admin) {
            $adminEmails[] = $admin->email;
        }

        $this->mail->send('admin/emails/feedback', ['feedback' => $feedback], function($message) use ($adminEmails, $feedback) {
            $message->to($adminEmails)->subject('New feedback has been submitted');
            $message->replyTo($feedback->email);
        });
    }

}