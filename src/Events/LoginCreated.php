<?php

namespace SureShinde\AuthChecker\Events;

use SureShinde\AuthChecker\Models\Login;

class LoginCreated
{
    /** @var Login $login */
    public $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
    }
}
