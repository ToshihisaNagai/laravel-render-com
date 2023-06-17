<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suji extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    //public function dates() {
    public function suji_dates() {
        //return $this->belongsToMany(Date::class);
        return $this->hasMany(SujiDate::class);
    }
}
