<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Abdulbaset\RolesAndPermissions\Traits\ActivityUserHasRoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    use HasFactory;
    use ActivityUserHasRoleTrait;
    protected $table = 'user_has_role';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}