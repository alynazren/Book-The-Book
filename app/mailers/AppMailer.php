<?php
namespace App\Mailers;

use App\Ticket;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer {
    protected $mailer; 
    protected $fromAddress = 'noreply@bookthebook.com';
    protected $fromName = 'BookTheBook!';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    // Preparing the email to be sent to user that posted book for sale
    public function sendBookSellInformation($user, BookSell $bookSell)
    {
        $this->to = $user->email;
        $this->subject = "[Book Selling ID: $bookSell->bookSell_id] $bookSell->title";
        $this->view = 'emails.bookSell_info';
        $this->data = compact('user', 'bookSell');

        return $this->deliver();
    }

    // Actual email sending
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }
}