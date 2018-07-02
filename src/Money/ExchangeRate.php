<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money;

use Randock\ValueObject\Money\Exception\InvalidExchangeRateToConvertException;

class ExchangeRate
{
    /**
     * @var Currency
     */
    private $source;
    /**
     * @var Currency
     */
    private $target;
    /**
     * @var float
     */
    private $rate;

    /**
     * ExchangeRate constructor.
     *
     * @param Currency $source
     * @param Currency $target
     * @param float $rate
     */
    public function __construct(
        Currency $source,
        Currency $target,
        float $rate
    ) {
        $this->source = $source;
        $this->target = $target;
        $this->rate = $rate;
    }

    /**
     * @param Money    $price
     * @param Currency $currency
     *
     * @throws InvalidExchangeRateToConvertException
     *
     * @return Money
     */
    public function convert(Money $price, Currency $currency): Money
    {
        if ((!$price->getCurrency()->equals($this->getSource()) || !$currency->equals($this->getTarget())) &&
            (!$price->getCurrency()->equals($this->getTarget()) || !$currency->equals($this->getSource()))) {
            throw new InvalidExchangeRateToConvertException();
        }

        if ($this->getTarget()->equals($currency)) {
            $amount = (float) $price->getAmount() * $this->getRate();
            return new Money((string) $amount, $currency);
        }

        $amount = (float) $price->getAmount() * (1 / $this->getRate());
        return new Money((string) $amount, $currency);
    }

    /**
     * @return Currency
     */
    public function getSource(): Currency
    {
        return $this->source;
    }

    /**
     * @param Currency $source
     *
     * @return ExchangeRate
     */
    public function setSource(Currency $source): ExchangeRate
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Currency
     */
    public function getTarget(): Currency
    {
        return $this->target;
    }

    /**
     * @param Currency $target
     *
     * @return ExchangeRate
     */
    public function setTarget(Currency $target): ExchangeRate
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     *
     * @return ExchangeRate
     */
    public function setRate(float $rate): ExchangeRate
    {
        $this->rate = $rate;

        return $this;
    }
}
