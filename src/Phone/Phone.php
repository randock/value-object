<?php

declare(strict_types=1);

namespace Randock\ValueObject\Phone;

use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use Randock\ValueObject\Phone\Exception\EmptyPhoneException;
use Randock\ValueObject\Phone\Exception\InvalidPhoneException;

/**
 * Class Phone.
 */
class Phone
{
    /**
     * @var string
     */
    private $phone;

    /**
     * @var PhoneNumber
     */
    private $parsedPhoneNumber;

    /**
     * @var string
     */
    private $locale;

    /**
     * Phone constructor.
     *
     * @param string      $phone
     * @param string|null $locale
     */
    public function __construct(
        string $phone,
        string $locale = null
    ) {
        $this->locale = $locale;
        $this->setPhone($phone);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return PhoneNumber
     */
    public function getParsedPhone(): PhoneNumber
    {
        return $this->parsedPhoneNumber;
    }

    /**
     * @param string $phone
     *
     * @throws EmptyPhoneException
     * @throws InvalidPhoneException
     *
     * @return Phone
     */
    public function setPhone(string $phone): Phone
    {
        if (!$phone) {
            throw new EmptyPhoneException();
        }

        try {
            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $this->parsedPhoneNumber = $phoneNumberUtil->parse($phone, $this->locale);
            $this->phone = $phoneNumberUtil->format($this->parsedPhoneNumber, PhoneNumberFormat::E164);
        } catch (\Exception $e) {
            throw new InvalidPhoneException();
        }

        return $this;
    }
}
