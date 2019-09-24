<?php

use function DI\create;
use App\Client\LightningbotClient;

return [
    LightningbotClient::class => create(LightningbotClient::class),


];
