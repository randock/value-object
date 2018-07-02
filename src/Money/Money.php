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
     * @var string
     */
    private $amount;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * Money constructor.
     *
     * @param string $amount
     * @param Currency $currency
     */
    public function __construct(string $amount, Currency $currency)
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
        $value = (float) $this->amount + (float) $money->getAmount();
        return new self((string) $value, $this->currency);
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }
}
