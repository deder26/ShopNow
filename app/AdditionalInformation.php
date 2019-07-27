<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
   protected $fillable = ['company_name','company_description','company_contact','company_email','company_address','company_logo'];
}
