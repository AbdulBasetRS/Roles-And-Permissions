<?php 

namespace Abdulbaset\RolesAndPermissions\Traits;

if ((config('RolesAndPermissionsConfig.activities.Role') === true) AND trait_exists('\Abdulbaset\Activities\Traits\ActivityLoggable')) {
  trait ActivityRoleTrait {
    use \Abdulbaset\Activities\Traits\ActivityLoggable;
      //. 
  }
} else {
  trait ActivityRoleTrait {
      // .
  }
}
