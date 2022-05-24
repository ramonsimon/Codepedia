<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComments extends Model
{
    public $table = 'question_comments';

    protected $guarded = [];

    use HasFactory;
}
