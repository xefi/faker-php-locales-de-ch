<?php

namespace Xefi\Faker\DeCh\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0(31|41|43|44|52|56|61|62|71|81|75|76|77|78|79)\d{7}$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^0(31|41|43|44|52|56|61|62|71|81) \d{3} \d{2} \d{2}$/', $this->faker->spacedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^07[5-9] \d{3} \d{2} \d{2}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+41(31|41|43|44|52|56|61|62|71|81|75|76|77|78|79)\d{7}$/', $this->faker->indicatoredPhoneNumber());
        }
    }
}
