<?php

declare(strict_types=1);

namespace Randock\ValueObject\Country\Exception;

/**
 * Class CountryWrongCodeException.
 */
class CountryWrongCodeException extends \Exception
{
    /**
     * CountryWrongCodeException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.country.exception.wrong_code');
    }
}
