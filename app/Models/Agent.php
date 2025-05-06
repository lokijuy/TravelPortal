<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
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
        'branch_id',
    ];

    /**
     * Get the branch that owns the agent.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the packages associated with the agent.
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'agent_packages')
            ->using(AgentPackage::class)
            ->withTimestamps();
    }

    /**
     * Get the users associated with the agent.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
} 