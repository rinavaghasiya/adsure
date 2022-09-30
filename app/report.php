<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    public $table = 'report';
    protected $fillable = [
        'mobileappid', 'days', 'dfpadunits', 'adrequests', 'matchedrequests',
        'clicks', 'ctr', 'estimatedrevenue', 'adimpressions', 'adecpm',
    ];
}
