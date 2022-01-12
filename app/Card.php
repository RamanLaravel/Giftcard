<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = "gift_cards";

    protected $fillable = [
        'name', 'value','type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}