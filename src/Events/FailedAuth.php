<?php

namespace SureShinde\AuthChecker\Events;

use SureShinde\AuthChecker\Models\Device;
use SureShinde\AuthChecker\Models\Login;

class FailedAuth
{
    /** @var Login $login */
    public $login;
    /** @var Device $device */
    public $device;

    public function __construct(Login $login, Device $device)
    {
        $this->login = $login;
        $this->device = $device;
    }
}
