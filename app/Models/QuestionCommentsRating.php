<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCommentsRating extends Model
{
    public $table = 'question_comments_rating';

    protected $guarded = [];

    use HasFactory;
}
