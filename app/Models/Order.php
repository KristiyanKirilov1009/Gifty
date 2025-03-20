<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'amount',
        'currency',
        'stripe_payment_id',
        'stripe_cs_id',
        'receip_ur',
        'customer',
        'shipping',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // code ...
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // code ...
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_item')->withPivot('quantity', 'price');
    }
}
