<?php

use Abdulbaset\RolesAndPermissions\Models\Permission;
use Abdulbaset\RolesAndPermissions\Models\Role;
use Abdulbaset\RolesAndPermissions\Models\RoleHasPermission;
use Abdulbaset\RolesAndPermissions\Models\UserHasRole;
use Illuminate\Support\Facades\DB;

function my_helper($param) {
    return '- From Hellper | ' . strtoupper($param) ;
}

function authHasPermission($permission_name) {

    $UserHasRole = UserHasRole::where('user_id' , auth()->id())->get();

    if ($UserHasRole->isEmpty()) {
        return false;
    }

    $Permission = Permission::where('name',$permission_name)->get();

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

function authHasRole($role_name){

    $Role = Role::where('name',$role_name)->get();

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

function assignRoleToUser($role_id,$user_id){

    $Role = Role::find($role_id);
    if ($Role->isEmpty()) {
        return false;
    }

    $User = DB::table(config('RolesAndPermissionsConfig.table_relationship'))->where('id', $user_id)->first();
    if ($User->isEmpty()) {
        return false;
    }

    $UserHasRole = UserHasRole::where('user_id', $user_id)->where('role_id', $user_id)->get();
    if ($UserHasRole->isNotEmpty()) {
        return false;
    }

    $UserHasRole = new UserHasRole();
    $UserHasRole->user_id = $User->id;
    $UserHasRole->role_id = $Role->id;
    if ($UserHasRole->save()) {
        return true;
    }

    return false;

}

function assignPermissionToRole($permission_id,$role_id){

    $Role = Role::find($role_id);
    if ($Role->isEmpty()) {
        return false;
    }

    $Permission = Permission::find($permission_id);
    if ($Permission->isEmpty()) {
        return false;
    }

    $RoleHasPermission = new RoleHasPermission();
    $RoleHasPermission->role_id = $Role->id;
    $RoleHasPermission->permission_id = $Permission->id;
    if ($RoleHasPermission->save()) {
        return true;
    }

    return false;

}

function checkUserHasRole($role_id, $user_id){

    $Role = Role::find($role_id);
    if ($Role->isEmpty()) {
        return false;
    }

    $User = DB::table(config('RolesAndPermissionsConfig.table_relationship'))->where('id', $user_id)->first();
    if ($User->isEmpty()) {
        return false;
    }

    $UserHasRole = UserHasRole::where('user_id', $user_id)->where('role_id', $user_id)->get();
    if ($UserHasRole->isNotEmpty()) {
        return true;
    }

    return false;
}

function checkUserHasPermission($permission_id, $user_id){
    $User = DB::table(config('RolesAndPermissionsConfig.table_relationship'))->where('id', $user_id)->first();
    if ($User->isEmpty()) {
        return false;
    }

    $Permission = Permission::find($permission_id);
    if ($Permission->isEmpty()) {
        return false;
    }

    $UserHasRole = UserHasRole::where('user_id' , $user_id)->get();
    if ($UserHasRole->isEmpty()) {
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

function setNewPermission($name,$display_name = null,$description = null){

    $Permission = new Permission();
    $Permission->name = $name;
    $Permission->display_name = $display_name;
    $Permission->description = $description;

    if ($Permission->save()) {
        return true;
    }

    return false;
}

function setNewRole($name,$display_name = null,$description = null){

    $Permission = new Role();
    $Permission->name = $name;
    $Permission->display_name = $display_name;
    $Permission->description = $description;

    if ($Permission->save()) {
        return true;
    }

    return false;
}