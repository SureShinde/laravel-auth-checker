<?php

namespace SureShinde\AuthChecker\Events;

use SureShinde\AuthChecker\Models\Device;
use Illuminate\Queue\SerializesModels;

class DeviceCreated
{
    use SerializesModels;

    /** @var Device $device */
    public $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }
}
