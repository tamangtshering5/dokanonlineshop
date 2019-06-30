<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Submenuimage extends Model
{
    protected $guarded = ['id'];

    public function Submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
}
