<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeNews extends Model
{
    protected $fillable = ['title','sourceName','flag'];
}
