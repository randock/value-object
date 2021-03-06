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
     * @throws EmptyPhoneException
     * @throws InvalidPhoneException
     */
    public function getParsedPhone(): PhoneNumber
    {
        if (null === $this->parsedPhoneNumber && null !== $this->phone) {
            $this->setPhone($this->phone);
        }
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

            // check if this is only the country code or if we need to parse
            if (null !== $this->locale && false !== stripos($this->locale, '_')) {
                $locale = \Locale::parseLocale($this->locale);
                $locale = $locale['region'];
            } else {
                $locale = $this->locale;
            }

            $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $this->parsedPhoneNumber = $phoneNumberUtil->parse($phone, $locale);
            $this->phone = $phoneNumberUtil->format($this->parsedPhoneNumber, PhoneNumberFormat::E164);
        } catch (\Exception $e) {
            throw new InvalidPhoneException();
        }

        return $this;
    }
}
