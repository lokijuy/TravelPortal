<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AgentPackage extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agent_packages';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'agent_id',
        'package_id',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
} 