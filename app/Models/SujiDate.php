<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SujiDate extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function sujis() {
        return $this->belongsTo(Suji::class);
    }

}
