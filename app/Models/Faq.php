<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model 
{

    protected $table = 'faqs';
    public $timestamps = true;
    protected $fillable = array('question', 'answer');

}