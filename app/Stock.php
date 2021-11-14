<?php

namespace App;
use Product;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    
	protected $fillable = [
		'product_id',
		'quantity_rec',
		'price',
        
	];

    public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
}
