<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionSubComments extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Question()
    {
        return $this->hasMany(Question::class);
    }

    public function Question_comment()
    {
        return $this->hasMany(question_comments::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
