<?php

declare(strict_types=1);

namespace Tests\Randock\ValueObject\Money;

use Randock\ValueObject\Money\Money;
use Randock\ValueObject\Money\Currency;
use Randock\ValueObject\Money\Exception\CurrenciesNotEqualForSumException;

/**
 * Class MoneyTest.
 */
class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public const AMOUNT = 100;
    public const CURRENCY = 'EUR';

    /**
     * @group unit
     */
    public function testGetters()
    {
        $money = new Money(self::AMOUNT, $currency = new Currency(self::CURRENCY));

        self::assertEquals(100, $money->getAmount());
        self::assertEquals($currency, $money->getCurrency());
    }

    /**
     * @group unit
     */
    public function testAddAmount()
    {
        $money1 = new Money(self::AMOUNT, $currency = new Currency(self::CURRENCY));
        $money2 = new Money(self::AMOUNT, $currency = new Currency(self::CURRENCY));

        self::assertNotEquals($money1, $money1->add($money2));
        self::assertNotEquals($money2, $money1->add($money2));
        self::assertEquals(200, $money1->add($money2)->getAmount());
    }

    /**
     * @group unit
     */
    public function testCurrenciesNotEqualForSumException()
    {
        $money1 = new Money(self::AMOUNT, $currency = new Currency(self::CURRENCY));
        $money2 = new Money(self::AMOUNT, $currency = new Currency('USD'));

        self::expectException(CurrenciesNotEqualForSumException::class);
        $money1->add($money2);
    }
}
