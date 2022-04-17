<?php declare(strict_types=1);

namespace App\Shared\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Src\Frontend\Customer\Domain\Customer;

final class WelcomeNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    public Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function build(): self
    {
        return $this->view('frontend.customer.emails.welcome')
            ->with([
                'customer' => $this->customer,
            ]);
    }
}
