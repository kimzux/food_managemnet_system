<?php

namespace App;
use Order_product;
use Stock;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $table = 'products';
    
	protected $fillable = [
		'productName',
		'productcategory',
		
        
	];
    public function order_product()
	{
		return $this->hasMany('App\Order_product');
	}
	public function stock()
	{
		return $this->hasOne('Stock:class');
	}
}
