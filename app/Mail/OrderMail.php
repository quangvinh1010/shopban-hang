<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $token;

    public function __construct($order, $token)
    {
        $this->order = $order;
        $this->token = $token;
    }

    public function build()
    {
        return $this->view('email.order')
                    ->with([
                        'order' => $this->order,
                        'token' => $this->token,
                    ])
                    ->subject('Order Confirmation');
    }
}
