<?php

namespace App\Http\Controllers;

use App\Jobs\SaveEmail;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\DB;
use App\Models\EmailList;
use Symfony\Component\Mime\Email;


class FormController extends Controller
{
    public function index()
    {
        return view('forms.create');
    }
    public function create()
    {
        return view('forms.create');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'description' => 'nullable'
        ]);

        DB::transaction(function () use ($request) {
            $form = Form::create($request->all());
            Queue::push(new SaveEmail($request->input('emails_list'), $form->id));

        });

        return redirect(route('forms.index'));
    }

}