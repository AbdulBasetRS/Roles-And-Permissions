<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Abdulbaset\RolesAndPermissions\Traits\ActivityRoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;
    use ActivityRoleTrait;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}