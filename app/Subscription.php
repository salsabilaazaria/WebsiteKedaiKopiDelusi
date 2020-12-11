<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['deliverytype', 'payment', 'address', 'cart'];
    public function user(){
        return $this->belongsTo ('App\User');
    }
}
