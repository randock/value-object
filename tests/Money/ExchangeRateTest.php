<?php

declare(strict_types=1);

namespace Tests\Randock\CommonBundle\ValueObject\Money;

use Randock\ValueObject\Money\Money;
use Randock\ValueObject\Money\Currency;
use Randock\ValueObject\Money\ExchangeRate;
use Randock\ValueObject\Money\Exception\InvalidExchangeRateToConvertException;

class ExchangeRateTest extends \PHPUnit_Framework_TestCase
{
    public const FAKE_SOURCE = 'USD';
    public const FAKE_TARGET = 'EUR';
    public const FAKE_RATE = 0.91;

    /**
     * @group unit
     */
    public function testGettersAndSetters()
    {
        $eRate = self::newExchangeRateValueObject();
        self::assertInstanceOf(ExchangeRate::class, $eRate);

        $currencySource = new Currency('GBP');
        $currencyTarget = new Currency('USD');

        self::assertSame($currencySource, $eRate->setSource($currencySource)->getSource());
        self::assertSame($currencyTarget, $eRate->setTarget($currencyTarget)->getTarget());
        self::assertSame(1.21, $eRate->setRate(1.21)->getRate());
    }

    public function testAppliesOnlyToCorrectCurrencies()
    {
        $eRate = self::newExchangeRateValueObject();

        // should not throw exceptions
        $eRate->convert(new Money(1.20, new Currency('EUR')), new Currency('USD'));
        $eRate->convert(new Money(1.20, new Currency('USD')), new Currency('EUR'));

        $this->expectException(InvalidExchangeRateToConvertException::class);
        $eRate->convert(new Money(1.20, new Currency('EUR')), new Currency('GBP'));

        $this->expectException(InvalidExchangeRateToConvertException::class);
        $eRate->convert(new Money(1.20, new Currency('GBP')), new Currency('USD'));
    }

    public function testConvertNormal()
    {
        $eRate = self::newExchangeRateValueObject();
        $rate = $eRate->convert(new Money(1.20, new Currency('USD')), new Currency('EUR'));
        self::assertSame(1.092, $rate->getAmount());
    }

    public function testConvertInverted()
    {
        $eRate = self::newExchangeRateValueObject();
        $rate = $eRate->convert(new Money(1.20, new Currency('EUR')), new Currency('USD'));
        self::assertSame(1.3186813186813184, $rate->getAmount());
    }

    public static function newExchangeRateValueObject()
    {
        return new ExchangeRate(
                new Currency(self::FAKE_SOURCE),
                new Currency(self::FAKE_TARGET),
                self::FAKE_RATE
        );
    }
}
