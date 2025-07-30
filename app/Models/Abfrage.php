<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abfrage extends Model
{
    protected $table = 'abfrage'; 

    protected $fillable = ['name', 'about', 'school_id', 'email'];
}
