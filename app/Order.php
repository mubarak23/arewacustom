<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

	use SoftDeletes;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'qauntity', 'address'
    ];


    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }


    public function product(){
    	return $this->belongsTo(Prodcut::class, 'product_id');
    }




}

