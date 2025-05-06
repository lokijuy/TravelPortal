<?php

namespace App\Services;

use App\Models\Coverage;
use App\Models\Benefit;
use Illuminate\Support\Collection;

class CoverageBenefitService
{
    /**
     * Assign benefits to a coverage.
     *
     * @param Coverage $coverage
     * @param array|Collection $benefitIds
     * @return void
     */
    public function assignBenefits(Coverage $coverage, array|Collection $benefitIds): void
    {
        $coverage->benefits()->sync($benefitIds);
    }

    /**
     * Add benefits to a coverage without removing existing ones.
     *
     * @param Coverage $coverage
     * @param array|Collection $benefitIds
     * @return void
     */
    public function attachBenefits(Coverage $coverage, array|Collection $benefitIds): void
    {
        $coverage->benefits()->attach($benefitIds);
    }

    /**
     * Remove benefits from a coverage.
     *
     * @param Coverage $coverage
     * @param array|Collection $benefitIds
     * @return void
     */
    public function detachBenefits(Coverage $coverage, array|Collection $benefitIds): void
    {
        $coverage->benefits()->detach($benefitIds);
    }

    /**
     * Get all benefits assigned to a coverage.
     *
     * @param Coverage $coverage
     * @return Collection
     */
    public function getCoverageBenefits(Coverage $coverage): Collection
    {
        return $coverage->benefits;
    }

    /**
     * Check if a coverage has a specific benefit.
     *
     * @param Coverage $coverage
     * @param Benefit|int $benefit
     * @return bool
     */
    public function hasBenefit(Coverage $coverage, Benefit|int $benefit): bool
    {
        $benefitId = $benefit instanceof Benefit ? $benefit->id : $benefit;
        return $coverage->benefits()->where('benefit_id', $benefitId)->exists();
    }
} 