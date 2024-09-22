<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subscribtions extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id','note'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id')
            ->withTrashed();
    }
}
