<?php 

namespace Abdulbaset\RolesAndPermissions\Traits;

if ((config('RolesAndPermissionsConfig.activities.Permission') === true) AND trait_exists('\Abdulbaset\Activities\Traits\ActivityLoggable')) {
  trait ActivityPermissionTrait {
    use \Abdulbaset\Activities\Traits\ActivityLoggable;
      //. 
  }
} else {
  trait ActivityPermissionTrait {
      // .
  }
}
