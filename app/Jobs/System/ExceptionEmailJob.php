<?php

namespace App\Jobs\System;

use Mail;
use App\Mail\System\Exception;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExceptionEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $exception;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($exception)
    {
        $this->exception = $exception;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (ALLOW_MAIL_SYSTEM_EXCEPTION) Mail::to(EMAIL_ERROR_REPORT)->send(new Exception($this->exception));
    }
}
