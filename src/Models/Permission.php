<?php

namespace Abdulbaset\RolesAndPermissions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
