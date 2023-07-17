<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFormEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function handle()
    {

        //Mail::to($this->formData['emails_list'])->send(new \App\Mail\FormSubmissionMail($this->formData));
    }
}