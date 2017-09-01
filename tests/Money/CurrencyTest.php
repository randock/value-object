<?php

declare(strict_types=1);

namespace Tests\Randock\ValueObject\Money;

use Randock\ValueObject\Money\Currency;
use Randock\ValueObject\Money\Exception\CurrencyWrongCodeException;

/**
 * Class CurrencyTest.
 */
class CurrencyTest extends \PHPUnit_Framework_TestCase
{
    public const CURRENCY_EUR = 'EUR';
    public const CURRENCY_ENG = 'GBP';

    /**
     * @group unit
     */
    public function testCurrencyBadCode()
    {
        try {
            new Currency('EURO');
        } catch (CurrencyWrongCodeException $e) {
            self::assertEquals('randock.currency.exception.wrong_code', $e->getMessage());
        }
    }

    /**
     * @group unit
     */
    public function testGetters()
    {
        $currency = new Currency(self::CURRENCY_EUR);

        self::assertEquals(self::CURRENCY_EUR, $currency->getCurrencyCode());
        self::assertEquals(self::CURRENCY_EUR, $currency->getCode());
    }

    /**
     * @group unit
     */
    public function testCurrencyEqual()
    {
        $currency = new Currency(self::CURRENCY_EUR);
        $currency2 = new Currency(self::CURRENCY_EUR);
        $currency3 = new Currency(self::CURRENCY_ENG);

        self::assertTrue($currency->equals($currency2));
        self::assertFalse($currency->equals($currency3));
    }
}
