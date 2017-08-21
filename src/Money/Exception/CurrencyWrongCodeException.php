<?php

declare(strict_types=1);

namespace Randock\ValueObject\Money\Exception;

/**
 * Class CurrencyWrongCodeException.
 */
class CurrencyWrongCodeException extends \Exception
{
    /**
     * CurrencyWrongCodeException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.currency.exception.wrong_code');
    }
}
