<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthrpt extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupnumber', 'fyear', 'fmonth', 'placement', 'video', 'rv', 'bs', 'total_hours', 'publisher_id', 'remarks', 'fullname', 'final_entry'
    ];
    
    public $timestamps = false; 
}
