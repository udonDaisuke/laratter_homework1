<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'subject','note',
        'start_date','start_time',
        'end_date','end_time',
        'allday_flag'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
