<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'product_collection_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'craft_technique',
        'material',
        'dimensions_info',
        'wash_care',
        'price',
        'compare_at_price',
        'stock_quantity',
        'is_featured',
        'is_new_arrival',
        'is_bestseller',
        'rating',
        'review_count',
        'primary_image',
        'gallery_images',
        'options',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'compare_at_price' => 'decimal:2',
            'stock_quantity' => 'integer',
            'is_featured' => 'boolean',
            'is_new_arrival' => 'boolean',
            'is_bestseller' => 'boolean',
            'rating' => 'decimal:2',
            'review_count' => 'integer',
            'gallery_images' => 'array',
            'options' => 'array',
        ];
    }

    /**
     * Category relation.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Collection relation.
     */
    public function productCollection(): BelongsTo
    {
        return $this->belongsTo(ProductCollection::class, 'product_collection_id');
    }

    /**
     * Reviews relation.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('is_approved', true);
    }

    /**
     * Order items relation.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Scope for featured products.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for new arrivals.
     */
    public function scopeNewArrivals(Builder $query): Builder
    {
        return $query->where('is_new_arrival', true);
    }

    /**
     * Scope for bestsellers.
     */
    public function scopeBestsellers(Builder $query): Builder
    {
        return $query->where('is_bestseller', true);
    }

    /**
     * Calculate discount percentage if compare_at_price is higher.
     */
    public function discountPercentage(): int
    {
        if ($this->compare_at_price && $this->compare_at_price > $this->price) {
            return (int) round((($this->compare_at_price - $this->price) / $this->compare_at_price) * 100);
        }

        return 0;
    }

    /**
     * Check if product is in stock.
     */
    public function inStock(): bool
    {
        return $this->stock_quantity > 0;
    }
}
