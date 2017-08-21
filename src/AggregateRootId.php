<?php

declare(strict_types=1);

namespace Randock\ValueObject;

use Ramsey\Uuid\Uuid;
use Randock\ValueObject\Exception\InvalidUUIDException;

/**
 * Class AggregateRootId.
 *
 * Its the unique identifier and will be auto-generated if not value is set.
 */
abstract class AggregateRootId
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * AggregateRootId constructor.
     *
     * @param null|string $id
     */
    public function __construct(string $id = null)
    {
        try {
            $this->uuid = Uuid::fromString($id ?: Uuid::uuid4())->toString();
        } catch (\InvalidArgumentException $e) {
            throw new InvalidUUIDException();
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uuid;
    }

    /**
     * @param AggregateRootId $aggregateRootId
     *
     * @return bool
     */
    public function equals(AggregateRootId $aggregateRootId)
    {
        return $this->uuid === $aggregateRootId->__toString();
    }

    /**
     * @return string
     */
    public function bytes(): string
    {
        return Uuid::fromString($this->uuid)->getBytes();
    }

    /**
     * @param string $uuid
     *
     * @return string
     */
    public static function stringToBytes(string $uuid): string
    {
        return Uuid::fromString($uuid)->getBytes();
    }
}
