<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'product_id');
    }

    public function latestCompletedOrder()
    {
        return $this->hasOne(Order::class)
            ->where('status', 'completed')
            ->orderByDesc('created_at');
    }

}
