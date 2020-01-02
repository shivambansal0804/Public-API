<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Subscriber extends Model
{
    use Uuids;

    protected $fillable = [
        'email'
    ];
}
