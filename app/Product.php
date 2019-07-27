<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= ['catagory_id','productType_id','product_name','product_description','product_price','product_quantity','product_image'];
}
