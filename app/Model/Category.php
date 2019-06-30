<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function Menu()
    {
        return $this->hasMany(Menu::class);
    }

}
