<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsRating extends Model
{
    public $table = 'questions_rating';
    protected $guarded = [];
    use HasFactory;
}
