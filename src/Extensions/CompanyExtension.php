<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'de_CH';
    }

    private array $companies = [
        'Alpenwerk AG', 'Helvetia Solutions GmbH', 'Matterhorn Industries',
        'Rheinquelle AG', 'Säntis Engineering', 'Limmatfels GmbH',
        'Glacier Tech AG', 'Eidgenoss Logistics', 'Bündner Pharma AG',
        'Lugano Digital', 'Genferseewerk', 'Aareland AG',
        'Sihlpark GmbH', 'Bernerhof Vertrieb', 'Zürich Capital',
        'Basler Versicherung AG', 'Luzerner Maschinenbau', 'Walensee Energy',
        'Toggenburg Industries', 'Engadin Technologies', 'Jura Manufaktur',
        'Wallis Vermögen AG', 'Aletsch Solutions', 'Pilatus Innovation',
        'Säntis Holding', 'Glarner Stahlwerke', 'Schaffhauser Bau AG',
        'Thuner Logistik', 'Winterthurer Systems', 'Olten Dynamics',
    ];

    private array $uidWeights = [5, 4, 3, 2, 7, 6, 5, 4];

    /**
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Return a Swiss enterprise identification number (UID) with a valid check digit, such as "CHE-123.456.789".
     *
     * @return string
     */
    public function companyNumber(): string
    {
        do {
            $digits = $this->randomizer->getBytesFromString('0123456789', 8);
            $checkDigit = $this->uidCheckDigit($digits);
        } while ($checkDigit === 10);

        $uid = $digits.$checkDigit;

        return sprintf('CHE-%s.%s.%s', substr($uid, 0, 3), substr($uid, 3, 3), substr($uid, 6, 3));
    }

    /**
     * Return a Swiss VAT number, such as "CHE-123.456.789 MWST".
     *
     * @return string
     */
    public function vat(): string
    {
        return $this->companyNumber().' MWST';
    }

    /**
     * Return a commercial register number in the legacy format, such as "CH-020.3.012.345-6".
     *
     * @return string
     */
    public function handelsregisternummer(): string
    {
        $digits = $this->randomizer->getBytesFromString('0123456789', 11);

        return sprintf(
            'CH-%s.%s.%s.%s-%s',
            substr($digits, 0, 3),
            substr($digits, 3, 1),
            substr($digits, 4, 3),
            substr($digits, 7, 3),
            substr($digits, 10, 1)
        );
    }

    /**
     * Compute the modulo 11 check digit of the eight UID digits; 10 means the number cannot be issued.
     *
     * @param string $digits
     *
     * @return int
     */
    protected function uidCheckDigit(string $digits): int
    {
        $sum = 0;

        foreach (str_split($digits) as $index => $digit) {
            $sum += (int) $digit * $this->uidWeights[$index];
        }

        return (11 - $sum % 11) % 11;
    }
}
