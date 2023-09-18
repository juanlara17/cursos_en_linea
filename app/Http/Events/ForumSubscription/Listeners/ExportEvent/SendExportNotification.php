<?php

namespace App\Http\Events\ForumSubscription\Listeners\ExportEvent;

use App\Notifications\ForumSubscription\ExportNotification;
use App\Http\Events\ForumSubscription\Events\ExportEvent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExportNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $event->user
            ->notify((new ExportNotification($event->data))->locale($event->locale));


    }

}