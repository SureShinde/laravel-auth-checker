<?php

namespace SureShinde\AuthChecker\Tests\Stubs\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SureShinde\AuthChecker\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;
use SureShinde\AuthChecker\AuthChecker\Models\HasLoginsAndDevices;

class User extends Authenticatable implements HasLoginsAndDevicesInterface
{
    use Notifiable, HasLoginsAndDevices;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
