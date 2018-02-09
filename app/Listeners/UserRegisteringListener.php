<?php

namespace App\Listeners;

use App\Events\UserRegisteringEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Mail\MailToAdmin;


class UserRegisteringListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisteringEvent  $event
     * @return void
     */
    public function handle(UserRegisteringEvent $event)
    {
        \Mail::to(User::find(1))->send(new MailToAdmin($event->user));
    }
}
