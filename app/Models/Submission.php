<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Submission.php

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'gps_location',
        'picture',
        'date_time',
        'donate',
        'extra_remarks',
        'weight',
        'measurements',
        'material',
        'timeperiod',
    ];
}


