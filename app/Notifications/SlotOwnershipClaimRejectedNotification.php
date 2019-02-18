<?php

namespace App\Notifications;

use App\Models\Slot;
use App\Domain\User\Models\User;
use Illuminate\Notifications\Messages\MailMessage;

class SlotOwnershipClaimRejectedNotification extends BaseNotification
{
    /** @var \App\Mail\User */
    public $claimingUser;

    /** @var \App\Models\Slot */
    public $slot;

    public function __construct(User $claimingUser, Slot $slot)
    {
        $this->claimingUser = $claimingUser;

        $this->slot = $slot;
    }

    public function toMail(User $notifiable)
    {
        return (new MailMessage)
            ->subject("Your claim on {{ $this->slot->name }} has been rejected")
            ->markdown('notification-mails.slot-ownership-claim-rejected', [
                'claimingUser' => $this->claimingUser,
                'slot' => $this->slot,
            ]);
    }
}
