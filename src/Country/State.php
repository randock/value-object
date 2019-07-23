<?php

declare(strict_types=1);

namespace Randock\ValueObject\Country;

class State
{
    public const STATES = [
        'Calculator' => 'Unknown',
        'XX' => 'Unknown',
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AQ' => 'American samoa',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'EQ' => 'Canton &amp; enderbury isl',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'GU' => 'Guam',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New hampshire',
        'NJ' => 'New jersey',
        'NM' => 'New mexico',
        'NY' => 'New york',
        'NC' => 'North carolina',
        'ND' => 'North dakota',
        'CQ' => 'North mariana isl',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'PR' => 'Puerto rico',
        'RI' => 'Rhode island',
        'SC' => 'South carolina',
        'SD' => 'South dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VQ' => 'Virgin islands',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
    ];

    /**
     * @var string
     */
    private $code;

    /**
     * State constructor.
     *
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::STATES[$this->getCode()];
    }
}
