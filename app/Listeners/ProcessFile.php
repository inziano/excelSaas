<?php

namespace App\Listeners;

use App\Events\FileUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Jobs\CloudUploadJob;

class ProcessFile
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
     * @param  \App\Events\FileUploaded  $event
     * @return void
     */
    public function handle(FileUploaded $event)
    {
        Log::info('Listener');
        //
        CloudUploadJob::dispatch($event->upload)->onQueue('cloud');
    }
}
