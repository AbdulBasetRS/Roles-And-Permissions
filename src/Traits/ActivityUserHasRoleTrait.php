<?php 

namespace Abdulbaset\RolesAndPermissions\Traits;

if ((config('RolesAndPermissionsConfig.activities.UserHasRole') === true) AND trait_exists('\Abdulbaset\Activities\Traits\ActivityLoggable')) {
  trait ActivityUserHasRoleTrait {
    use \Abdulbaset\Activities\Traits\ActivityLoggable;
      //. 
  }
} else {
  trait ActivityUserHasRoleTrait {
      // .
  }
}
