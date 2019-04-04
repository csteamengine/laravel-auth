<?php

namespace Csteamengine\LaravelAuth\Models\Auth;

use Csteamengine\LaravelAuth\Models\Auth\Traits\Method\RoleMethod;
use Csteamengine\LaravelAuth\Models\Auth\Traits\Attribute\RoleAttribute;

/**
 * Class Role.
 */
class Role extends \Spatie\Permission\Models\Role
{
    use RoleAttribute,
        RoleMethod;
}
