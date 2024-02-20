<?php

namespace SureShinde\AuthChecker\Tests\Stubs\Models;

use SureShinde\AuthChecker\AuthChecker\Models\Device;

class CustomDevice extends Device
{
    /** @var string $table */
    protected $table = 'devices';
}
