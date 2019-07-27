<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingInformation extends Model
{
    protected $fillable= ['customer_id','customer_name','customer_email','customer_contact','customer_address'];
}
