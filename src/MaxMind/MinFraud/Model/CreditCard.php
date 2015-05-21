<?php

namespace MaxMind\MinFraud\Model;

/**
 * Class CreditCard
 * @package MaxMind\MinFraud\Model
 *
 * @property string $country This property contains an {@link
 * http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 ISO 3166-1 alpha-2 country
 * code} representing the country that the card was issued in.
 *
 * @property boolean $isIssuedInBillingAddressCountry This property is true if
 * the country of the billing address matches the country that the credit card
 * was issued in.
 *
 * @property boolean $isPrepaid This property is true if the card is a prepaid
 * card.
 *
 * @property \MaxMind\MinFraud\Model\Issuer $issuer An object containing
 * information about the credit card issuer.
 *
 */
class CreditCard extends AbstractModel
{
    /**
     * @internal
     */
    protected $issuer;

    /**
     * @internal
     */
    protected $country;

    /**
     * @internal
     */
    protected $isIssuedInBillingAddressCountry;

    /**
     * @internal
     */
    protected $isPrepaid;

    public function __construct($response, $locales = array('en'))
    {
        $this->issuer = new Issuer($this->safeArrayLookup($response['issuer']));
        $this->country = $this->safeArrayLookup($response['country']);
        $this->isIssuedInBillingAddressCountry
            = $this->safeArrayLookup($response['is_issued_in_billing_address_country']);
        $this->isPrepaid = $this->safeArrayLookup($response['is_prepaid']);
    }
}
