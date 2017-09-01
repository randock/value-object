<?php

declare(strict_types=1);

namespace Tests\Randock\ValueObject;

use Randock\ValueObject\DynamicObjectStorage;

/**
 * Class DynamicObjectStorageTest.
 */
class DynamicObjectStorageTest extends \PHPUnit_Framework_TestCase
{
    public function testDynamicObjectGetters()
    {
        $details = static::newDynamicObjectStorage();

        $object = new \stdClass();
        $object->a = 'b';
        $object->c = 'd';
        $object->e = 'f';

        $this->assertSame([1, 2, 3], $details->getArray());
        $this->assertFalse($details->getBoolean());
        $this->assertNull($details->getNull());
        $this->assertSame(123, $details->getNumber());
        $this->assertSame('Hello World', $details->getString());
        $this->assertSame($object->a, $details->getObject()->getA());

        $this->assertInstanceOf(DynamicObjectStorage::class, $details);
        $this->assertNull($details->getTest());
    }

    public function testDynamicObjectSetters()
    {
        $details = static::newDynamicObjectStorage();

        $details->setNumber(10000);

        $this->assertSame(10000, $details->getNumber());
    }

    //test for __set Function
    public function testDynamicObjectSetFunction()
    {
        $details = static::newDynamicObjectStorage();
        $details->a = 'a';
        $details->number = 25;

        $this->assertSame(25, $details->getnumber());
        $this->assertSame('a', $details->geta());
    }

    //test for __get Function
    public function testDynamicObjectGetFunction()
    {
        $details = static::newDynamicObjectStorage();

        $object = new \stdClass();
        $object->a = 'b';
        $object->c = 'd';
        $object->e = 'f';

        $this->assertSame([1, 2, 3], $details->array);
        $this->assertFalse($details->boolean);
        $this->assertNull($details->null);
        $this->assertSame(123, $details->number);
        $this->assertSame('Hello World', $details->string);
        $this->assertSame($object->a, $details->object->getA());

        $this->assertInstanceOf(DynamicObjectStorage::class, $details);
        $this->assertNull($details->test);
    }

    public static function newDynamicObjectStorage()
    {
        $object = new \stdClass();
        $object->a = 'b';
        $object->c = 'd';
        $object->e = 'f';

        return new DynamicObjectStorage(json_decode(json_encode([
            'array' => [1, 2, 3],
            'boolean' => false,
            'null' => null,
            'number' => 123,
            'object' => $object,
            'string' => 'Hello World',
        ])));
    }
}
