<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playroom extends Model
{
    use HasFactory;
    protected $table = 'playroom';
    protected $fillable  =['user_id','product_group','t0','t1','t2','t3','t4','t5','t6','t7','t8','t9','qty','points','date','time'];
}
