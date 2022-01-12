<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cardtype extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "cardtypes";
    protected $fillable = [
        'name', 'percent'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}