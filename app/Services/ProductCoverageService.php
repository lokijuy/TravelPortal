<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Coverage;
use Illuminate\Support\Collection;

class ProductCoverageService
{
    /**
     * Assign coverages to a product.
     *
     * @param Product $product
     * @param array|Collection $coverageIds
     * @return void
     */
    public function assignCoverages(Product $product, array|Collection $coverageIds): void
    {
        $product->coverages()->sync($coverageIds);
    }

    /**
     * Add coverages to a product without removing existing ones.
     *
     * @param Product $product
     * @param array|Collection $coverageIds
     * @return void
     */
    public function attachCoverages(Product $product, array|Collection $coverageIds): void
    {
        $product->coverages()->attach($coverageIds);
    }

    /**
     * Remove coverages from a product.
     *
     * @param Product $product
     * @param array|Collection $coverageIds
     * @return void
     */
    public function detachCoverages(Product $product, array|Collection $coverageIds): void
    {
        $product->coverages()->detach($coverageIds);
    }

    /**
     * Get all coverages assigned to a product.
     *
     * @param Product $product
     * @return Collection
     */
    public function getProductCoverages(Product $product): Collection
    {
        return $product->coverages;
    }

    /**
     * Check if a product has a specific coverage.
     *
     * @param Product $product
     * @param Coverage|int $coverage
     * @return bool
     */
    public function hasCoverage(Product $product, Coverage|int $coverage): bool
    {
        $coverageId = $coverage instanceof Coverage ? $coverage->id : $coverage;
        return $product->coverages()->where('coverage_id', $coverageId)->exists();
    }
} 