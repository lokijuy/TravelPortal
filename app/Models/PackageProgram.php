<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PackageProgram extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'package_programs';

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
        'package_id',
        'program_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
} 