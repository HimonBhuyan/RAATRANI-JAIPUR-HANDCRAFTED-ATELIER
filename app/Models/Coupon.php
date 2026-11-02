<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_spend',
        'is_active',
        'expires_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'value' => 'decimal:2',
            'min_spend' => 'decimal:2',
            'is_active' => 'boolean',
            'expires_at' => 'datetime',
        ];
    }

    /**
     * Check if the coupon is valid for a given order subtotal.
     */
    public function isValidFor(float $subtotal): bool
    {
        if (! $this->is_active) {
            return false;
        }

        if ($this->expires_at && Carbon::now()->greaterThan($this->expires_at)) {
            return false;
        }

        if ($this->min_spend > 0 && $subtotal < (float) $this->min_spend) {
            return false;
        }

        return true;
    }

    /**
     * Calculate discount amount.
     */
    public function calculateDiscount(float $subtotal): float
    {
        if (! $this->isValidFor($subtotal)) {
            return 0.0;
        }

        if ($this->type === 'percent') {
            return round(($subtotal * (float) $this->value) / 100, 2);
        }

        return min((float) $this->value, $subtotal);
    }
}
