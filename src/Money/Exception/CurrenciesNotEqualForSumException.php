<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money\Exception;

class CurrenciesNotEqualForSumException extends \Exception
{
    /**
     * CurrenciesNotEqualForSumException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.money.exception.common.currencies_not_equal_for_sum');
    }
}
