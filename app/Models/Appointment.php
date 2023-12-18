<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory;
    // protected $table = 'appointments';
    protected $dates = ['created_at',];
    public $timestamps = false;

    protected $fillable = [
        'schedule_id',
        'timeslot_id',
        'service_id',
        'name',
        'email',
        'address',
        'phone_no',
        'notes',
        'created_at',
        'status',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class, 'timeslot_id');
    }   

}
