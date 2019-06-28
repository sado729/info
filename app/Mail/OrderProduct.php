<?php

namespace App\Mail;

use App\Models\BasketProduct;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderProduct extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $basketProduct;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,BasketProduct $basketProduct)
    {
        $this->user = $user;
        $this->basketProduct = $basketProduct;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($user,$basketProduct)
    {
        return $this
        ->from('mail@teksis.az')
        ->with(
            [
                'user' => $user,
                'product' => $basketProduct,
            ])
        ->subject(config('app.name') . ' - Məhsul sifarişi')
        ->view('mails.order_product');
    }
}