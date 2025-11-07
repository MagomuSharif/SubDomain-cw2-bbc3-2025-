<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    Protected $fillables = ['name','email','subject','message'];
}
