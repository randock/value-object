<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money;

use Randock\ValueObject\Money\Exception\CurrenciesNotEqualForSumException;

/**
 * Class Money.
 */
class Money
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * Money constructor.
     *
     * @param float    $amount
     * @param Currency $currency
     */
    public function __construct(float $amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param Money $money
     *
     * @throws CurrenciesNotEqualForSumException
     *
     * @return Money
     */
    public function add(Money $money): Money
    {
        if (!$this->currency->equals($money->getCurrency())) {
            throw new CurrenciesNotEqualForSumException();
        }

        $value = $this->amount + $money->getAmount();

        return new self($value, $this->currency);
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return is_float($this->amount) ? $this->amount : (float) $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param float $percent
     *
     * @return Money
     */
    public function percent(float $percent): self
    {
        $amount = ($this->amount * $percent) / 100;

        return new self($amount, $this->currency);
    }

    /**
     * @param float $percent
     *
     * @return Money
     */
    public function addPercent(float $percent): self
    {
        return $this->add($this->percent($percent));
    }
}
