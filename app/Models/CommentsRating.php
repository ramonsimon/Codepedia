<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsRating extends Model
{
    public $table = 'comments_rating';

    protected $guarded = [];

    use HasFactory;
}
