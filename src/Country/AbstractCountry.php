<?php

declare(strict_types=1);

namespace Randock\ValueObject\Country;

use Randock\ValueObject\Country\Exception\CountryWrongCodeException;

abstract class AbstractCountry
{
    /**
     * @var array
     */
    public const countries = [
        'BD' => 'BGD',
        'BE' => 'BEL',
        'BF' => 'BFA',
        'BG' => 'BGR',
        'BA' => 'BIH',
        'BB' => 'BRB',
        'WF' => 'WLF',
        'BL' => 'BLM',
        'BM' => 'BMU',
        'BN' => 'BRN',
        'BO' => 'BOL',
        'BH' => 'BHR',
        'BI' => 'BDI',
        'BJ' => 'BEN',
        'BT' => 'BTN',
        'JM' => 'JAM',
        'BV' => 'BVT',
        'BW' => 'BWA',
        'WS' => 'WSM',
        'BQ' => 'BES',
        'BR' => 'BRA',
        'BS' => 'BHS',
        'JE' => 'JEY',
        'BY' => 'BLR',
        'BZ' => 'BLZ',
        'RU' => 'RUS',
        'RW' => 'RWA',
        'RS' => 'SRB',
        'TL' => 'TLS',
        'RE' => 'REU',
        'TM' => 'TKM',
        'TJ' => 'TJK',
        'RO' => 'ROU',
        'TK' => 'TKL',
        'GW' => 'GNB',
        'GU' => 'GUM',
        'GT' => 'GTM',
        'GS' => 'SGS',
        'GR' => 'GRC',
        'GQ' => 'GNQ',
        'GP' => 'GLP',
        'JP' => 'JPN',
        'GY' => 'GUY',
        'GG' => 'GGY',
        'GF' => 'GUF',
        'GE' => 'GEO',
        'GD' => 'GRD',
        'GB' => 'GBR',
        'GA' => 'GAB',
        'SV' => 'SLV',
        'GN' => 'GIN',
        'GM' => 'GMB',
        'GL' => 'GRL',
        'GI' => 'GIB',
        'GH' => 'GHA',
        'OM' => 'OMN',
        'TN' => 'TUN',
        'JO' => 'JOR',
        'HR' => 'HRV',
        'HT' => 'HTI',
        'HU' => 'HUN',
        'HK' => 'HKG',
        'HN' => 'HND',
        'HM' => 'HMD',
        'VE' => 'VEN',
        'PR' => 'PRI',
        'PS' => 'PSE',
        'PW' => 'PLW',
        'PT' => 'PRT',
        'SJ' => 'SJM',
        'PY' => 'PRY',
        'IQ' => 'IRQ',
        'PA' => 'PAN',
        'PF' => 'PYF',
        'PG' => 'PNG',
        'PE' => 'PER',
        'PK' => 'PAK',
        'PH' => 'PHL',
        'PN' => 'PCN',
        'PL' => 'POL',
        'PM' => 'SPM',
        'ZM' => 'ZMB',
        'EH' => 'ESH',
        'EE' => 'EST',
        'EG' => 'EGY',
        'ZA' => 'ZAF',
        'EC' => 'ECU',
        'IT' => 'ITA',
        'VN' => 'VNM',
        'SB' => 'SLB',
        'ET' => 'ETH',
        'SO' => 'SOM',
        'ZW' => 'ZWE',
        'SA' => 'SAU',
        'ES' => 'ESP',
        'ER' => 'ERI',
        'ME' => 'MNE',
        'MD' => 'MDA',
        'MG' => 'MDG',
        'MF' => 'MAF',
        'MA' => 'MAR',
        'MC' => 'MCO',
        'UZ' => 'UZB',
        'MM' => 'MMR',
        'ML' => 'MLI',
        'MO' => 'MAC',
        'MN' => 'MNG',
        'MH' => 'MHL',
        'MK' => 'MKD',
        'MU' => 'MUS',
        'MT' => 'MLT',
        'MW' => 'MWI',
        'MV' => 'MDV',
        'MQ' => 'MTQ',
        'MP' => 'MNP',
        'MS' => 'MSR',
        'MR' => 'MRT',
        'IM' => 'IMN',
        'UG' => 'UGA',
        'TZ' => 'TZA',
        'MY' => 'MYS',
        'MX' => 'MEX',
        'IL' => 'ISR',
        'FR' => 'FRA',
        'IO' => 'IOT',
        'SH' => 'SHN',
        'FI' => 'FIN',
        'FJ' => 'FJI',
        'FK' => 'FLK',
        'FM' => 'FSM',
        'FO' => 'FRO',
        'NI' => 'NIC',
        'NL' => 'NLD',
        'NO' => 'NOR',
        'NA' => 'NAM',
        'VU' => 'VUT',
        'NC' => 'NCL',
        'NE' => 'NER',
        'NF' => 'NFK',
        'NG' => 'NGA',
        'NZ' => 'NZL',
        'NP' => 'NPL',
        'NR' => 'NRU',
        'NU' => 'NIU',
        'CK' => 'COK',
        'XK' => 'XKX',
        'CI' => 'CIV',
        'CH' => 'CHE',
        'CO' => 'COL',
        'CN' => 'CHN',
        'CM' => 'CMR',
        'CL' => 'CHL',
        'CC' => 'CCK',
        'CA' => 'CAN',
        'CG' => 'COG',
        'CF' => 'CAF',
        'CD' => 'COD',
        'CZ' => 'CZE',
        'CY' => 'CYP',
        'CX' => 'CXR',
        'CR' => 'CRI',
        'CW' => 'CUW',
        'CV' => 'CPV',
        'CU' => 'CUB',
        'SZ' => 'SWZ',
        'SY' => 'SYR',
        'SX' => 'SXM',
        'KG' => 'KGZ',
        'KE' => 'KEN',
        'SS' => 'SSD',
        'SR' => 'SUR',
        'KI' => 'KIR',
        'KH' => 'KHM',
        'KN' => 'KNA',
        'KM' => 'COM',
        'ST' => 'STP',
        'SK' => 'SVK',
        'KR' => 'KOR',
        'SI' => 'SVN',
        'KP' => 'PRK',
        'KW' => 'KWT',
        'SN' => 'SEN',
        'SM' => 'SMR',
        'SL' => 'SLE',
        'SC' => 'SYC',
        'KZ' => 'KAZ',
        'KY' => 'CYM',
        'SG' => 'SGP',
        'SE' => 'SWE',
        'SD' => 'SDN',
        'DO' => 'DOM',
        'DM' => 'DMA',
        'DJ' => 'DJI',
        'DK' => 'DNK',
        'VG' => 'VGB',
        'DE' => 'DEU',
        'YE' => 'YEM',
        'DZ' => 'DZA',
        'US' => 'USA',
        'UY' => 'URY',
        'YT' => 'MYT',
        'UM' => 'UMI',
        'LB' => 'LBN',
        'LC' => 'LCA',
        'LA' => 'LAO',
        'TV' => 'TUV',
        'TW' => 'TWN',
        'TT' => 'TTO',
        'TR' => 'TUR',
        'LK' => 'LKA',
        'LI' => 'LIE',
        'LV' => 'LVA',
        'TO' => 'TON',
        'LT' => 'LTU',
        'LU' => 'LUX',
        'LR' => 'LBR',
        'LS' => 'LSO',
        'TH' => 'THA',
        'TF' => 'ATF',
        'TG' => 'TGO',
        'TD' => 'TCD',
        'TC' => 'TCA',
        'LY' => 'LBY',
        'VA' => 'VAT',
        'VC' => 'VCT',
        'AE' => 'ARE',
        'AD' => 'AND',
        'AG' => 'ATG',
        'AF' => 'AFG',
        'AI' => 'AIA',
        'VI' => 'VIR',
        'IS' => 'ISL',
        'IR' => 'IRN',
        'AM' => 'ARM',
        'AL' => 'ALB',
        'AO' => 'AGO',
        'AQ' => 'ATA',
        'AS' => 'ASM',
        'AR' => 'ARG',
        'AU' => 'AUS',
        'AT' => 'AUT',
        'AW' => 'ABW',
        'IN' => 'IND',
        'AX' => 'ALA',
        'AZ' => 'AZE',
        'IE' => 'IRL',
        'ID' => 'IDN',
        'UA' => 'UKR',
        'QA' => 'QAT',
        'MZ' => 'MOZ',
    ];

    /**
     * @var string
     */
    protected $isoCode;

    /**
     * Country constructor.
     *
     * @param string $isoCode
     */
    public function __construct(string $isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    /**
     * @param string $locale
     *
     * @return string
     */
    public function getName(string $locale): string
    {
        return \Locale::getDisplayRegion('-' . $this->isoCode, $locale);
    }

    /**
     * @return string
     */
    public function getIso2Code(): string
    {
        return $this->isoCode;
    }

    /**
     * @return bool
     */
    public function isNull()
    {
        return null === $this->isoCode;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function getIso3Code(): string
    {
        return self::countries[$this->isoCode];
    }

    /**
     * @param string $isoCode
     *
     * @throws CountryWrongCodeException
     *
     * @return AbstractCountry
     */
    public function setIsoCode(string $isoCode): AbstractCountry
    {
        if (false === self::isValid($isoCode)) {
            throw new CountryWrongCodeException();
        }

        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * @param string $isoCode
     *
     * @return bool
     */
    public static function isValid(string $isoCode) : bool
    {
        return array_key_exists($isoCode, self::countries);
    }
}
