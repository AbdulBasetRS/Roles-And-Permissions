<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Abdulbaset\RolesAndPermissions\Traits\ActivityRoleHasPermissionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    use HasFactory;
    use ActivityRoleHasPermissionTrait;
    protected $table = 'role_has_permissions';

    protected $fillable = [
        'role_id',
        'permission_id',
    ];
}