<?php

namespace Xefi\Faker\DeCh\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\DeCh\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected array $provinces = [];
    protected array $regions = [];
    protected array $cityNames = [];
    protected array $streetNames = [];
    protected array $streetSuffixes = [];

    protected function setUp(): void
    {
        parent::setUp();

        $addressExtension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($addressExtension);

        $this->provinces = $reflection->getProperty('provinces')->getValue($addressExtension);
        $this->regions = $reflection->getProperty('regions')->getValue($addressExtension);
        $this->cityNames = $reflection->getProperty('cityNames')->getValue($addressExtension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($addressExtension);
        $this->streetSuffixes = $reflection->getProperty('streetSuffixes')->getValue($addressExtension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing($this->regions, $results);
    }

    public function testProvince(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->provinces); $i++) {
            $results[] = $this->faker->unique()->province();
        }

        $this->assertEqualsCanonicalizing(array_keys($this->provinces), $results);
    }

    public function testProvinceCode(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->provinces); $i++) {
            $results[] = $this->faker->unique()->provinceCode();
        }

        $this->assertEqualsCanonicalizing(array_values($this->provinces), $results);

        foreach ($results as $result) {
            $this->assertMatchesRegularExpression('/^[A-Z]{2}$/', $result);
        }
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cityNames); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing($this->cityNames, $results);
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $houseNumber = $this->faker->houseNumber();

            $this->assertIsInt($houseNumber);
            $this->assertGreaterThanOrEqual(1, $houseNumber);
            $this->assertLessThanOrEqual(200, $houseNumber);
        }
    }

    public function testStreetName(): void
    {
        $pattern = sprintf(
            '/^(%s)(%s)$/u',
            implode('|', array_map('preg_quote', $this->streetNames)),
            implode('|', array_map('preg_quote', $this->streetSuffixes))
        );

        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression($pattern, $this->faker->streetName());
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\p{Lu}\p{Ll}+ \d{1,3}$/u', $this->faker->streetAddress());
        }
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $postcode = $this->faker->postcode();

            $this->assertIsInt($postcode);
            $this->assertGreaterThanOrEqual(1000, $postcode);
            $this->assertLessThanOrEqual(9658, $postcode);
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $address = $this->faker->fullAddress();

            $this->assertMatchesRegularExpression('/^\p{Lu}\p{Ll}+ \d{1,3}, \d{4} [\p{L} ]+$/u', $address);
        }
    }
}
