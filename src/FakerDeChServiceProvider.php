<?php

namespace Xefi\Faker\DeCh;

use Xefi\Faker\DeCh\Extensions\AddressExtension;
use Xefi\Faker\DeCh\Extensions\ColorsExtension;
use Xefi\Faker\DeCh\Extensions\CompanyExtension;
use Xefi\Faker\DeCh\Extensions\FinancialExtension;
use Xefi\Faker\DeCh\Extensions\PersonExtension;
use Xefi\Faker\DeCh\Extensions\PhoneExtension;
use Xefi\Faker\DeCh\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerDeChServiceProvider extends Provider
{
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
