<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;
use Carbon\Carbon;

class CloudUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // 
    public $upload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($upload)
    {
        //
        $this->upload = $upload;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Log::info($this->upload);

        // Update the uploaded file record and set the is_processed flag to true and set the date.
        Upload::where('id', $this->upload->id)->update([
            'title' => $this->upload->title,
            'is_processed' => true,
            'processed_date' => Carbon::now()->addMinutes(90),
        ]);   
    }
}
