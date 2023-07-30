<?php

namespace Calendar\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    protected $fillable = ['name', 'age'];
}