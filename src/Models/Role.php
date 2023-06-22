<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
