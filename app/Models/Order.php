<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_date', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    // Accessor: Chuyển đổi giá trị từ database sang text
    public function getStatusAttribute($value)
    {
        return $value == 'completed' ? 'completed' : 'pending';
    }

    // Mutator: Chuyển đổi text về giá trị lưu trong database
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = in_array($value, ['pending', 'completed']) ? $value : 'pending';
    }
}

