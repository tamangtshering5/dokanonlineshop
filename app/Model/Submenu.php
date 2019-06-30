<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{


    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function Submenuimage()
    {
        return $this->hasMany(Submenuimage::class);
    }

}
