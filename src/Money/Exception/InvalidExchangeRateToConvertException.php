<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money\Exception;

class InvalidExchangeRateToConvertException extends \Exception
{
    /**
     * InvalidExchangeRateToConvertException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.exchange_rate.exception.common.invalid_exchange_rate_to_convert');
    }
}
