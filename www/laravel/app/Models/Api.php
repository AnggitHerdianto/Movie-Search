<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Api extends Model
{
    protected $connection   = 'mongodb';
    protected $collection   = 'klyp_dev_test';
    protected $primaryKey   = 'hash';
    protected $fillable     = ['hash', 'json'];
}
