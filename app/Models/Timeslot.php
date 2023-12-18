<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'start_time',
        'end_time',
        'status',
        'schedule_id'
    ];

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

}
