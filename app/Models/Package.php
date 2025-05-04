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
        'code',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'code' => 'string',
        'description' => 'string',
    ];

    /**
     * Get the agents associated with the package.
     */
    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agents_packages')
            ->using(AgentPackage::class)
            ->withTimestamps();
    }

    /**
     * Get the programs associated with the package.
     */
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
} 