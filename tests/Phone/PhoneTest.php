<?php

declare(strict_types=1);

namespace Tests\Randock\ValueObject\Money;

use libphonenumber\PhoneNumber;
use Randock\ValueObject\Phone\Phone;
use Randock\ValueObject\Phone\Exception\InvalidPhoneException;

/**
 * Class PhoneTest.
 */
class PhoneTest extends \PHPUnit_Framework_TestCase
{
    public const PHONE = '06123';
    public const PHONE_NL_NATIONAL = '0612345678';
    public const PHONE_NL_NATIONAL_PLUS = '+32612345678';
    public const PHONE_NL_E164 = '+31612345678';
    public const LOCALE = 'NL';
    public const FULL_LOCALE = 'nl_NL';

    /**
     * @group unit
     */
    public function testGetters()
    {
        $phone = self::newPhone();
        self::assertInstanceOf(Phone::class, $phone);
        self::assertInstanceOf(PhoneNumber::class, $phone->getParsedPhone());
        self::assertSame(self::PHONE_NL_E164, $phone->getPhone());
        $phone->setPhone(self::PHONE_NL_NATIONAL_PLUS);
        self::assertSame(self::PHONE_NL_NATIONAL_PLUS, $phone->getPhone());
    }

    public function testFullLocale()
    {
        $phone = new Phone(self::PHONE, self::FULL_LOCALE);
    }

    /**
     * @group unit
     */
    public function testInvalidPhoneException()
    {
        self::expectException(InvalidPhoneException::class);
        new Phone(self::PHONE);
    }

    public function newPhone()
    {
        return new Phone(self::PHONE_NL_NATIONAL, self::LOCALE);
    }
}
