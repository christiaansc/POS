<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
        /**
     * The permissions that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    
}
