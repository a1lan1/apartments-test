<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apartment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
        'description',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Builder $query
     * @param array|null $filter
     */
    public function scopeFilter(Builder $query, ?array $filter): void
    {
        $query->when(isset($filter['price']), function ($q) use ($filter) {
            return $q->where('price', '>=', $filter['price'][0])
                ->where('price', '<=', $filter['price'][1]);
        })
            ->when(isset($filter['name']) && strlen($filter['name']) > 2, function ($q) use ($filter) {
                return $q->where('name', 'LIKE', "%{$filter['name']}%");
            })
            ->when(isset($filter['bedrooms']), function ($q) use ($filter) {
                return $q->where('bedrooms', $filter['bedrooms']);
            })
            ->when(isset($filter['bathrooms']), function ($q) use ($filter) {
                return $q->where('bathrooms', $filter['bathrooms']);
            })
            ->when(isset($filter['storeys']), function ($q) use ($filter) {
                return $q->where('storeys', $filter['storeys']);
            })
            ->when(isset($filter['garages']), function ($q) use ($filter) {
                return $q->where('garages', $filter['garages']);
            });
    }
}
