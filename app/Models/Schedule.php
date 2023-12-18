<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use HasFactory;
    // protected $table = 'appointments';
    public $timestamps = false;
 
    protected $fillable = [
        'date',
        'service_id',
        'status',

    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function timeslot(){
        return $this->hasMany(Timeslot::class);
    }

}

