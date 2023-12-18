<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'timeslot_id',
        'start_time',
        'end_time',
        'status'
    ];
    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
}