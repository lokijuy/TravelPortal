<?php

namespace App\Services;

use App\Models\Agent;
use App\Models\Package;
use Illuminate\Support\Collection;

class AgentPackageService
{
    /**
     * Assign packages to an agent.
     *
     * @param Agent $agent
     * @param array|Collection $packageIds
     * @return void
     */
    public function assignPackages(Agent $agent, array|Collection $packageIds): void
    {
        $agent->packages()->sync($packageIds);
    }

    /**
     * Add packages to an agent without removing existing ones.
     *
     * @param Agent $agent
     * @param array|Collection $packageIds
     * @return void
     */
    public function attachPackages(Agent $agent, array|Collection $packageIds): void
    {
        $agent->packages()->attach($packageIds);
    }

    /**
     * Remove packages from an agent.
     *
     * @param Agent $agent
     * @param array|Collection $packageIds
     * @return void
     */
    public function detachPackages(Agent $agent, array|Collection $packageIds): void
    {
        $agent->packages()->detach($packageIds);
    }

    /**
     * Get all packages assigned to an agent.
     *
     * @param Agent $agent
     * @return Collection
     */
    public function getAgentPackages(Agent $agent): Collection
    {
        return $agent->packages;
    }

    /**
     * Check if an agent has a specific package.
     *
     * @param Agent $agent
     * @param Package|int $package
     * @return bool
     */
    public function hasPackage(Agent $agent, Package|int $package): bool
    {
        $packageId = $package instanceof Package ? $package->id : $package;
        return $agent->packages()->where('package_id', $packageId)->exists();
    }
} 