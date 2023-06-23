<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Abdulbaset\RolesAndPermissions\Traits\ActivityPermissionTrait;


class Permission extends Model {
    use HasFactory;
    use ActivityPermissionTrait;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
