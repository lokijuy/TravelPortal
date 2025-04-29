<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    /**
     * Get the permissions associated with the user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions')
            ->withTimestamps();
    }

    /**
     * Check if user has a specific permission
     * 
     * Example:
     * if ($user->hasPermission('edit-posts')) {
     *     // User can edit posts
     * }
     * 
     * @param string|Permission $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }

    /**
     * Check if user has any of the given permissions
     * 
     * Example:
     * if ($user->hasAnyPermission(['edit-posts', 'delete-posts'])) {
     *     // User can either edit or delete posts
     * }
     * 
     * @param array<string> $permissions
     * @return bool
     */
    public function hasAnyPermission(array $permissions)
    {
        return $this->permissions()->whereIn('name', $permissions)->exists();
    }

    /**
     * Grant a permission to the user
     * 
     * Example:
     * // Using permission name
     * $user->grantPermission('edit-posts');
     * 
     * // Using Permission model
     * $permission = Permission::find(1);
     * $user->grantPermission($permission);
     * 
     * @param string|Permission $permission
     * @return void
     */
    public function grantPermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        }
        
        if (!$this->hasPermission($permission->name)) {
            $this->permissions()->attach($permission);
        }
    }

    /**
     * Revoke a permission from the user
     * 
     * Example:
     * // Using permission name
     * $user->revokePermission('edit-posts');
     * 
     * // Using Permission model
     * $permission = Permission::find(1);
     * $user->revokePermission($permission);
     * 
     * @param string|Permission $permission
     * @return void
     */
    public function revokePermission($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('name', $permission)->firstOrFail();
        }
        
        $this->permissions()->detach($permission);
    }

    /**
     * Sync the user's permissions with the given array of permission names
     * 
     * Example:
     * // Only these permissions will remain, all others will be removed
     * $user->syncPermissions(['edit-posts', 'delete-posts']);
     * 
     * @param array<string> $permissions
     * @return void
     */
    public function syncPermissions(array $permissions)
    {
        $permissionIds = Permission::whereIn('name', $permissions)->pluck('id');
        $this->permissions()->sync($permissionIds);
    }
}
