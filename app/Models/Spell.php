<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
// Das ist das Modul für meine Zaubersprüche. Es ist mit der Slug-Funktionalität verbunden und die Felder sind für das Schreiben in die Datenbank freigegeben.
class Spell extends Model
{
    protected $fillable = ['name','description', 'price', 'school_id' ];
    use HasFactory;

    use Sluggable;
    public function sluggable():array {
        return [
        'slug' => ['source' => 'name', 'onUpdate' => true],
        ];
    }
    public function getRouteKeyName() {
        return 'slug';
}
}
