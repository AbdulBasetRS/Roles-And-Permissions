<?php 

namespace Abdulbaset\RolesAndPermissions\Traits;

if ((config('RolesAndPermissionsConfig.activities.RoleHasPermission') === true) AND trait_exists('\Abdulbaset\Activities\Traits\ActivityLoggable')) {
  trait ActivityRoleHasPermissionTrait {
    use \Abdulbaset\Activities\Traits\ActivityLoggable;
      //. 
  }
} else {
  trait ActivityRoleHasPermissionTrait {
      // .
  }
}
