<?php

namespace SureShinde\AuthChecker\Tests\Stubs\Models;

use SureShinde\AuthChecker\AuthChecker\Models\Login;

class CustomLogin extends Login
{
    /** @var string $table */
    protected $table = 'logins';
}
