<?php

namespace App\Services;

use App\Models\Program;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProgramProductService
{
    /**
     * Assign products to a program.
     *
     * @param Program $program
     * @param array|Collection $productIds
     * @return void
     */
    public function assignProducts(Program $program, array|Collection $productIds): void
    {
        $program->products()->sync($productIds);
    }

    /**
     * Add products to a program without removing existing ones.
     *
     * @param Program $program
     * @param array|Collection $productIds
     * @return void
     */
    public function attachProducts(Program $program, array|Collection $productIds): void
    {
        $program->products()->attach($productIds);
    }

    /**
     * Remove products from a program.
     *
     * @param Program $program
     * @param array|Collection $productIds
     * @return void
     */
    public function detachProducts(Program $program, array|Collection $productIds): void
    {
        $program->products()->detach($productIds);
    }

    /**
     * Get all products assigned to a program.
     *
     * @param Program $program
     * @return Collection
     */
    public function getProgramProducts(Program $program): Collection
    {
        return $program->products;
    }

    /**
     * Check if a program has a specific product.
     *
     * @param Program $program
     * @param Product|int $product
     * @return bool
     */
    public function hasProduct(Program $program, Product|int $product): bool
    {
        $productId = $product instanceof Product ? $product->id : $product;
        return $program->products()->where('product_id', $productId)->exists();
    }
} 