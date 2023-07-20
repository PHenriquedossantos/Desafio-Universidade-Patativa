<?php

namespace App\Http\Controllers;

use App\Jobs\SaveEmail;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        try {
            $form = Form::create($request->all());

            $data = $request->validate([
                'subject' => 'required',
                'message' => 'required',
                'emails_list' => 'nullable'
            ]);

            Queue::push(new SaveEmail($data, $form->id));

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();
            throw $e;
        }

        return redirect(route('forms.index'));
    }
}