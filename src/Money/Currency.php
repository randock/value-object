<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money;

use Randock\ValueObject\Money\Exception\CurrencyWrongCodeException;

/**
 * Class Currency.
 */
class Currency
{
    public const DEFAULT_CURRENCY = 'EUR';

    /**
     * @var string ISO code string
     */
    private $currencyCode;

    /**
     * Currency constructor.
     *
     * @param string $code
     */
    public function __construct(string $code = self::DEFAULT_CURRENCY)
    {
        $this->setCode($code);
    }

    /**
     * @param Currency $currency
     *
     * @return bool
     */
    public function equals(Currency $currency): bool
    {
        return $currency->getCode() === $this->currencyCode;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $code
     *
     * @throws CurrencyWrongCodeException
     */
    private function setCode(string $code)
    {
        if (!preg_match('/^[A-Z]{3}$/', $code)) {
            throw new CurrencyWrongCodeException();
        }

        $this->currencyCode = $code;
    }
}
