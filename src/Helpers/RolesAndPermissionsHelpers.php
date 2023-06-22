<?php

namespace Abdulbaset\RolesAndPermissions\Helpers;

use Abdulbaset\RolesAndPermissions\Models\Permission;
use Abdulbaset\RolesAndPermissions\Models\Role;
use Abdulbaset\RolesAndPermissions\Models\RoleHasPermission;
use Abdulbaset\RolesAndPermissions\Models\UserHasRole;

function my_helper($param) {
    return '- From Hellper' . strtoupper($param) ;
}

function authHasPermission($permission) {

    $UserHasRole = UserHasRole::where('user_id' , auth()->id())->get();

    if ($UserHasRole->isEmpty()) {
        return false;
    }

    $Permission = Permission::where('name',$permission)->get();

    if ($Permission->isEmpty()) {
        return false;
    }

    $Role = Role::find($UserHasRole->role_id);

    if ($Role->isEmpty()) {
        return false;
    }

    $RoleHasPermission = RoleHasPermission::where('role_id',$Role->id)->where('permission_id', $Permission->id)->get();

    if ($RoleHasPermission->isNotEmpty()) {
        return true;
    }

    return false;
    
}

function authHasRole($role){

    $Role = Role::where('name',$role)->get();

    if ($Role->isEmpty()) {
        return false;
    }

    $UserHasRole = UserHasRole::where('user_id' , auth()->id())->get();

    if ($UserHasRole->isEmpty()) {
        return false;
    }

    if ($UserHasRole->role_id == $Role->id) {
        return true;
    }

    return false;

}

