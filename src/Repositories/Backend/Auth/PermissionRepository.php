<?php

namespace Csteamengine\LaravelAuth\Repositories\Backend\Auth;

use Csteamengine\LaravelAuth\Repositories\BaseRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }
}
