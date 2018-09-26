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
     * @var string|null
     */
    private $locale;

    /**
     * Currency constructor.
     *
     * @param string $code
     */
    public function __construct(string $code = self::DEFAULT_CURRENCY, string $locale = null)
    {
        $this->setCode($code);
        $this->locale = $locale;
    }

    /**
     * @param Currency $currency
     *
     * @return bool
     */
    public function equals(Currency $currency): bool
    {
        return $currency->getCode() === $this->getCurrencyCode();
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
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

    /**
     * @return null|string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
}
