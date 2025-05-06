<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'gross',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gross' => 'decimal:2',
    ];

    /**
     * Get the programs associated with the product.
     */
    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class, 'program_products');
    }

    /**
     * Get the coverages associated with the product.
     */
    public function coverages(): BelongsToMany
    {
        return $this->belongsToMany(Coverage::class, 'product_coverages');
    }
} 