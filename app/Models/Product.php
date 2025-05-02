<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
        'program_id',
        'gross',
        'net',
        'premium_tax',
        'lgt',
        'doc_stamp',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gross' => 'decimal:2',
        'net' => 'decimal:2',
        'premium_tax' => 'decimal:2',
        'lgt' => 'decimal:2',
        'doc_stamp' => 'decimal:2',
    ];

    /**
     * Get the program that owns the product.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the coverages associated with the product.
     */
    public function coverages()
    {
        return $this->hasMany(Coverage::class);
    }
} 