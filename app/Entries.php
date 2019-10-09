<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    use Notifiable;
    //
    protected $table = 'entries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'childID', 'height', 'weight','waist','hip','fruits','veggies',
        'phyActivity','sleepWkd','sleepWed','screenTimeWkd','screenTimeWed',
        'complete'
    ];
}
