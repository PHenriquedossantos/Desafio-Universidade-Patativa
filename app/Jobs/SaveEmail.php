<?php

namespace App\Jobs;

use App\Mail\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SaveEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;
    protected $form_id;

    public function __construct($request, $form_id)
    {
        $this->request = $request;
        $this->form_id = $form_id;
    }
    public function handle()
    {
        $arrayEmails = explode("\r\n", $this->request['emails_list']);
        foreach ($arrayEmails as $email) {
            $response = Mail::to($email, '')->send(new Contact([
                'fromName' => 'henrique',
                'fromEmail' => 'henrique.ph935@gmail.com',
                'message' => $this->request['message'],
                'subject' => $this->request['subject'],
            ]));
            dd($response);
        }
    }
}