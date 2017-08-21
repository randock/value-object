<?php

declare(strict_types=1);

namespace Tests\Randock\CommonBundle\ValueObject\Country;

use Randock\ValueObject\Country\Country;
use Randock\ValueObject\Country\Exception\CountryWrongCodeException;

/**
 * Class CountryTest.
 */
class CountryTest extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $country = new Country('ES');

        self::assertEquals('ES', $country->getIso2Code());
        self::assertEquals('ESP', $country->getIso3Code());
        self::assertEquals('España', $country->getName('ES'));
    }

    public function testWrongCode()
    {
        $this->expectException(CountryWrongCodeException::class);
        $country = new Country('ÑÑ');
    }
}
