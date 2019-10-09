<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use Notifiable;
    //
    protected $table = 'parents';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pFname', 'pLname', 'pType','pEmail'
    ];
}
