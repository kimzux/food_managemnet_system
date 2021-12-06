<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const TAKEN = 'taken';
    const CANCELLED = 'cancelled';

    protected $fillable = ['student_id', 'status', 'order_no', 'date', 'total_price'];

    protected $table = 'order';

    public function products()
    {
        return $this->hasMany(Order_product::class, 'order_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
  
}
