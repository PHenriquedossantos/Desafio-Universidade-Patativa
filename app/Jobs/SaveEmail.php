<?php

namespace App\Jobs;

use App\Models\EmailList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $emails;
    protected $form_id;

    public function __construct($emails, $form_id)
    {
        $this->emails = $emails;
        $this->form_id = $form_id;
    }

    public function handle()
    {

        $arrayEmails = explode("\r\n", $this->emails);


        foreach ($arrayEmails as $email) {
            $emailList = new EmailList([
                'emails_list' => $email,
                'form_id' => $this->form_id,
            ]);
            $emailList->save();
        }
    }
}