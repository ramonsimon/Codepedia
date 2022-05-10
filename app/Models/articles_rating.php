<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles_rating extends Model
{
    public $table = 'articles_rating';
    use HasFactory;
    protected $guarded = [];
}
