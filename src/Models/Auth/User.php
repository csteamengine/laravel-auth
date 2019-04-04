<?php

namespace Csteamengine\LaravelAuth\Models\Auth;

use Csteamengine\LaravelAuth\Models\Traits\Uuid;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Csteamengine\LaravelAuth\Models\Auth\Traits\Scope\UserScope;
use Csteamengine\LaravelAuth\Models\Auth\Traits\Method\UserMethod;
use Illuminate\Database\Eloquent\SoftDeletes;
use Csteamengine\LaravelAuth\Models\Auth\Traits\SendUserPasswordReset;
use Csteamengine\LaravelAuth\Models\Auth\Traits\Attribute\UserAttribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Csteamengine\LaravelAuth\Models\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends Authenticatable
{
    use HasRoles,
        Notifiable,
        Billable,
        SendUserPasswordReset,
        SoftDeletes,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope,
        Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'password_changed_at',
        'active',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
        'is_featured',
        'artist_statement',
        'artist_bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
    ];

    public function about_image(){
        return $this->belongsTo('Csteamengine\LaravelAuth\Models\Image', 'about_image_id', 'id');
    }

    public function background_image(){
        return $this->belongsTo('Csteamengine\LaravelAuth\Models\Image', 'background_image_id', 'id');
    }
}
