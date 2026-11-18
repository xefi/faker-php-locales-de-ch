<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+41';

    public function getLocale(): ?string
    {
        return 'de_CH';
    }

    protected array $landlineFormats = [
        '31{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '41{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '43{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '44{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '52{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '56{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '61{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '62{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '71{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '81{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '75{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '76{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '77{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '78{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '79{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    /**
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
