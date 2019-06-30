<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

}
