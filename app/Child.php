<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use Notifiable;
    //
    protected $table = 'child';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'childID','parentID', 'CfName', 'ClName','sex','DOB', 'age'
    ];
}
