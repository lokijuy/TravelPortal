<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'package_id',
    ];

    /**
     * Get the package that owns the program.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Get the products associated with the program.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
} 