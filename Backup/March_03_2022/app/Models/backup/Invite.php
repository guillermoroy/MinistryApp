<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Invite extends Model
{
    use HasFactory;
    protected $table = 'invite';
    public $timestamps = false;


    protected $fillable = [
        'gender',
        'address',
        'bible_tag',
        'disturb_tag',
        'rv_tag',
    ];
    


}


