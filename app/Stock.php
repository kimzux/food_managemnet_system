<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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
		// 'App\User','user_id'
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	public function scopeSumQuantity(Builder $query)
	{
		return $query->selectRaw("MAX(id) id, product_id, SUM(quantity_rec) as total_qnt")
			->groupBy('product_id');
	}
}
