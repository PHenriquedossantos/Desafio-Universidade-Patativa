<?php

namespace App\Http\Controllers;

use App\Jobs\SendFormEmailJob;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }
    public function create()
    {
        return view('forms.create');
    }
    public function store(Request $request)
    {
        //dd($request);
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'emails_list' => 'required',
            'description' => 'nullable'
        ]);

        DB::transaction(function () use ($data) {
            $newProduct = Form::create($data);
            Queue::push(new SendFormEmailJob($newProduct));
        });


        return redirect(route('forms.index'));
    }
}