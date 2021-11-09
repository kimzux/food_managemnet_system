<?php

namespace App;
use Order_product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $table = 'products';
    
	protected $fillable = [
		'productName',
		'productPrice',
		'productcategory',
		
        
	];
    public function order_product()
	{
		return $this->hasMany('App\Order_product');
	}
}
