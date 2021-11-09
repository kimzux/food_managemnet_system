<?php

namespace App;
use Product;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
     
    protected $table = 'order_product';
    
	protected $fillable = [
		'product_id',
		'quantity',
		'price',
		 'date',
        
	];

    public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}


}

