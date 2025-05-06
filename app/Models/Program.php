<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
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
    ];

    /**
     * Get the packages associated with the program.
     */
    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'package_programs');
    }

    /**
     * Get the products associated with the program.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'program_products');
    }
}