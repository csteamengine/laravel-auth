<?php

namespace Csteamengine\LaravelAuth\Models\Auth\Traits\Relationship;

use Csteamengine\LaravelAuth\Models\System\Session;
use Csteamengine\LaravelAuth\Models\Auth\SocialAccount;
use Csteamengine\LaravelAuth\Models\Auth\PasswordHistory;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }
}
