<?php

declare(strict_types=1);

namespace Randock\ValueObject\Phone\Exception;

class EmptyPhoneException extends \Exception
{
    /**
     * EmptyPhoneException constructor.
     */
    public function __construct()
    {
        parent::__construct('randock.common.value_object.phone.exception.empty_phone');
    }
}
