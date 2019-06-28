<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductDeclineMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user,$product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('office@telefoncu.az')
            ->subject(config('app.name') . ' - Elanınız deaktiv edildi')
            ->view('app.mails.product_decline');
    }
}
