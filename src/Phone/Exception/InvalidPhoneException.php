<?php

declare(strict_types=1);

namespace Randock\ValueObject\Phone\Exception;

class InvalidPhoneException extends \Exception
{
    /**
     * InvalidPhoneException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.common.value_object.phone.exception.invalid_phone');
    }
}
