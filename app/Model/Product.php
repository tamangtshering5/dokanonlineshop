<?php

namespace App\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SearchableTrait;
    protected $searchable = [

        'columns' => [
            'products.product_name' => 10,
            'products.detail' => 10,

        ],
        /*'joins' => [
            'posts' => ['users.id','posts.user_id'],
        ],*/
    ];
}
