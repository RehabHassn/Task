<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title','type','info'];
    public function comments()
    {
        return $this->belongsTo(Comment::class,'comment_id','id');
    }
}
