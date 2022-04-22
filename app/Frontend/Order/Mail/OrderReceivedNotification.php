<?php declare(strict_types=1);

namespace App\Frontend\Order\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Src\Frontend\Order\Domain\Order;

final class OrderReceivedNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Order $purchase;

    public function __construct(Order $purchase)
    {
        $this->purchase = $purchase;
    }

    public function build(): self
    {
        return $this->view('frontend.purchase.emails.order_received')
            ->with([
                'purchase' => $this->purchase,
            ]);
    }
}
