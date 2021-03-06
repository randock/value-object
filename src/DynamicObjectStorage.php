<?php

declare(strict_types=1);

namespace Randock\ValueObject;

use Randock\Model\Definition\PatchableInterface;

/**
 * Class DynamicObjectStorage.
 */
class DynamicObjectStorage implements PatchableInterface
{
    /**
     * @var \stdClass
     */
    protected $data;

    /**
     * DynamicObjectStorage constructor.
     *
     * @param \stdClass|null $data
     */
    public function __construct(\stdClass $data = null)
    {
        $this->data = $data;
    }

    /**
     * @param string     $name
     * @param array|null $arguments
     *
     * @return bool|null
     */
    public function __call(string $name, array $arguments = null)
    {
        if (substr($name, 0, 3) === 'get') {
            $key = lcfirst(substr($name, 3));
            $data = $this->data->$key ?? null;


            // if it's an array, we see if we can cast it to an object(assoc keys)
            if (is_array($data)) {
                $data = json_decode(
                    json_encode(
                        $data
                    )
                );
            }

            if (is_object($data)) {
                $data = new self($data);
            }

            return $data;
        } elseif (substr($name, 0, 3) === 'set') {
            $key = lcfirst(substr($name, 3));
            $this->data->$key = $arguments[0];
        }
    }

    /**
     * @param string $name
     *
     * @return null|DynamicObjectStorage
     */
    public function __get(string $name)
    {
        $data = $this->data->$name ?? null;

        // if it's an array, we see if we can cast it to an object(assoc keys)
        if (is_array($data)) {
            $data = json_decode(
                json_encode(
                    $data
                )
            );
        }

        if (is_object($data)) {
            $data = new self($data);
        }

        return $data;
    }

    /**
     * @param string $name
     * @param $arguments
     */
    public function __set(string $name, $arguments)
    {
        $this->data->$name = $arguments;
    }

    /**
     * @param \stdClass $data
     */
    public function patch(\stdClass $data)
    {
        foreach ($data as $property => $fieldValue) {
            $getter = sprintf('get%s', ucfirst($property));
            if ($fieldValue instanceof \stdClass && !($this->$getter() instanceof DynamicObjectStorage) && !is_array($this->$getter())) {
                foreach ($fieldValue as $key => $value) {
                    if (null !== $this->$getter()) {
                        if (null !== $this->$getter()->$key) {
                            $this->$getter()->$key = $value;
                        } else {
                            return [$property => $key];
                        }
                    } else {
                        return $property;
                    }
                }
            } else {
                $setter = sprintf('set%s', ucfirst($property));
                $this->$setter($fieldValue);
            }
        }
    }

    public function toJsonObject()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return json_decode(json_encode($this->data), true);
    }
}
