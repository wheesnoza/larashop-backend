<?php declare(strict_types=1);

namespace App\Frontend\Purchase\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Src\Frontend\Customer\Domain\Customer;
use Src\Frontend\Purchase\Domain\Purchase;

final class OrderReceivedNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Purchase $purchase;

    public function __construct(Purchase $purchase)
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
