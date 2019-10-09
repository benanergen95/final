<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use Notifiable;
    //
    protected $table = 'results';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'childID', 'BMI', 'RBMI','WHR','RfruitsIntake','RveggieIntake','RphysicalActivity',
        'RStimeWkd','RStimeWed','RscreentimeWkd','RscreentimeWed'
    ];
}
