<?php

namespace Xefi\Faker\DeCh\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    public function getLocale(): string|null
    {
        return 'de_CH';
    }

    protected $provinces = [
        'Zürich' => 'ZH', 'Bern' => 'BE', 'Luzern' => 'LU', 'Uri' => 'UR', 'Schwyz' => 'SZ', 'Obwalden' => 'OW',
        'Nidwalden' => 'NW', 'Glarus' => 'GL', 'Zug' => 'ZG', 'Freiburg' => 'FR', 'Solothurn' => 'SO',
        'Basel-Stadt' => 'BS', 'Basel-Landschaft' => 'BL', 'Schaffhausen' => 'SH', 'Appenzell Ausserrhoden' => 'AR',
        'Appenzell Innerrhoden' => 'AI', 'St. Gallen' => 'SG', 'Graubünden' => 'GR', 'Aargau' => 'AG',
        'Thurgau' => 'TG', 'Tessin' => 'TI', 'Waadt' => 'VD', 'Wallis' => 'VS', 'Neuenburg' => 'NE',
        'Genf' => 'GE', 'Jura' => 'JU',
    ];

    protected $regions = [
        'Deutschschweiz', 'Romandie', 'Italienische Schweiz', 'Rätoromanische Schweiz',
    ];

    protected $streetSuffixes = [
        'strasse', 'weg', 'platz', 'allee', 'gasse', 'ring', 'steig', 'pfad', 'rain',
    ];

    protected $streetNames = [
        'Bahnhof', 'Haupt', 'Dorf', 'Markt', 'Berg', 'Kirch', 'See', 'Brunnen',
        'Schloss', 'Schul', 'Spital', 'Wald', 'Sonnen', 'Mond', 'Stern', 'Eiger',
        'Matterhorn', 'Jungfrau', 'Rhein', 'Aare', 'Limmat', 'Reuss', 'Sihl', 'Säntis',
        'Pilatus', 'Rigi', 'Furka', 'Gotthard', 'Albis', 'Uetli',
    ];

    protected $cityNames = [
        'Zürich', 'Bern', 'Basel', 'Luzern', 'Winterthur', 'Biel', 'Thun', 'Köniz',
        'Schaffhausen', 'Chur', 'Aarau', 'Zug', 'Solothurn', 'Frauenfeld', 'Liestal',
        'Olten', 'Baden', 'Wil', 'Uster', 'Bülach', 'Dübendorf', 'Kloten', 'Wetzikon',
        'Rapperswil', 'Kreuzlingen', 'Glarus', 'Sarnen', 'Stans', 'Altdorf', 'Herisau',
    ];

    /**
     * Return a random linguistic region of Switzerland.
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Return a random canton name.
     *
     * @return string
     */
    public function province(): string
    {
        return $this->pickArrayRandomKey($this->provinces);
    }

    /**
     * Return a random two-letter canton code.
     *
     * @return string
     */
    public function provinceCode(): string
    {
        return $this->pickArrayRandomElement($this->provinces);
    }

    /**
     * Return a random city name.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cityNames);
    }

    /**
     * Return a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 200);
    }

    /**
     * Return a random street name, such as "Bahnhofstrasse".
     *
     * @return string
     */
    public function streetName(): string
    {
        return sprintf('%s%s', $this->pickArrayRandomElement($this->streetNames), $this->pickArrayRandomElement($this->streetSuffixes));
    }

    /**
     * Return a random street name followed by a house number.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Return a random four-digit Swiss postcode.
     *
     * @return int
     */
    public function postcode(): int
    {
        return $this->randomizer->getInt(1000, 9658);
    }

    /**
     * Return a full postal address, such as "Bahnhofstrasse 12, 8001 Zürich".
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %d %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}
