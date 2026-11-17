<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    public function getLocale(): string|null
    {
        return 'de_CH';
    }

    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'CH';
        }

        if ($format === null) {
            $format = sprintf(
                '%s%s%s',
                str_repeat('{d}', 2),
                str_repeat('{d}', 5),
                str_repeat('{d}', 10)
            );
        }

        return parent::iban($countryCode, $format);
    }
}
