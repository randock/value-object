<?php

declare(strict_types=1);

namespace Randock\ValueObject\Exception;

/**
 * Class InvalidUUIDException.
 */
class InvalidUUIDException extends \InvalidArgumentException
{
    /**
     * InvalidUUIDException constructor.
     */
    public function __construct()
    {
        parent::__construct('aggregator_root.exception.invalid_uuid', 400);
    }
}
