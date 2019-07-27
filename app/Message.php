<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $fillable = ['sender_name','sender_email','sender_subject','sender_message','reply','status'];
}
