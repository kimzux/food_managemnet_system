<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
     
    protected $table = 'order_product';
    
	protected $fillable = [
		'product_id',
		'quantity',
		'order_id',
		'price',
		 'date',
        
	];

    public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
	public function orders()
	{
		return $this->belongsTo(Order::class, 'order_id', 'id');
	}

}

