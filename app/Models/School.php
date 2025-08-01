<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name'];

    public function spells()
    {
        return $this->hasMany(Spell::class);
    }
}
