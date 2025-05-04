<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentPackage extends Model
{
    protected $table = 'agents_packages';

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