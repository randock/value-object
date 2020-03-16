<?php

declare(strict_types=1);

namespace Randock\ValueObject\Definition;

/**
 * Interface PatchableInterface.
 */
interface PatchableInterface
{
    public function patch(\stdClass $data);
}
