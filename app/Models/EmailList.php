<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    protected $fillable = [

        'form_id',
        'emails_list'
    ];
    use HasFactory;
}