<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoverageBenefit extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coverage_benefits';

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
        'coverage_id',
        'benefit_id',
    ];

    public function coverage()
    {
        return $this->belongsTo(Coverage::class);
    }

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
} 