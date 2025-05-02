<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'policy_limit',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'policy_limit' => 'decimal:2',
    ];

    /**
     * Get the agents associated with the package.
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    /**
     * Get the programs associated with the package.
     */
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
} 