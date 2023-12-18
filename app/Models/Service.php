<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'description',
        'status'
    ];


    public function schedule()
    {
        // return $this->hasMany(Schedule::class, 'id', 'schedule_id');
        return $this->hasMany(Schedule::class);
    }

    // public function schedule(){
    //     return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    // }


}
