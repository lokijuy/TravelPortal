<?php

namespace App\Services;

use App\Models\Package;
use App\Models\Program;
use Illuminate\Support\Collection;

class PackageProgramService
{
    /**
     * Assign programs to a package.
     *
     * @param Package $package
     * @param array|Collection $programIds
     * @return void
     */
    public function assignPrograms(Package $package, array|Collection $programIds): void
    {
        $package->programs()->sync($programIds);
    }

    /**
     * Add programs to a package without removing existing ones.
     *
     * @param Package $package
     * @param array|Collection $programIds
     * @return void
     */
    public function attachPrograms(Package $package, array|Collection $programIds): void
    {
        $package->programs()->attach($programIds);
    }

    /**
     * Remove programs from a package.
     *
     * @param Package $package
     * @param array|Collection $programIds
     * @return void
     */
    public function detachPrograms(Package $package, array|Collection $programIds): void
    {
        $package->programs()->detach($programIds);
    }

    /**
     * Get all programs assigned to a package.
     *
     * @param Package $package
     * @return Collection
     */
    public function getPackagePrograms(Package $package): Collection
    {
        return $package->programs;
    }

    /**
     * Check if a package has a specific program.
     *
     * @param Package $package
     * @param Program|int $program
     * @return bool
     */
    public function hasProgram(Package $package, Program|int $program): bool
    {
        $programId = $program instanceof Program ? $program->id : $program;
        return $package->programs()->where('program_id', $programId)->exists();
    }
} 