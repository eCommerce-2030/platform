<?php declare(strict_types=1);

namespace Shopware\Storefront\Page\Address\Listing;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Event\NestedEvent;
use Shopware\Core\Framework\Event\ShopwareSalesChannelEvent;
use Shopware\Core\Framework\Feature;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

/**
 * @package storefront
 *
 * @deprecated tag:v6.5.0 - Use @see \Shopware\Core\Checkout\Customer\Event\AddressListingCriteriaEvent instead
 */
class AddressListingCriteriaEvent extends NestedEvent implements ShopwareSalesChannelEvent
{
    /**
     * @var Criteria
     */
    private $criteria;

    /**
     * @var SalesChannelContext
     */
    private $salesChannelContext;

    public function __construct(Criteria $criteria, SalesChannelContext $salesChannelContext)
    {
        $this->criteria = $criteria;
        $this->salesChannelContext = $salesChannelContext;
    }

    public function getCriteria(): Criteria
    {
        Feature::triggerDeprecationOrThrow(
            'v6.5.0.0',
            Feature::deprecatedClassMessage(__CLASS__, 'v6.5.0.0', 'Shopware\Core\Checkout\Customer\Event\AddressListingCriteriaEvent')
        );

        return $this->criteria;
    }

    public function getContext(): Context
    {
        Feature::triggerDeprecationOrThrow(
            'v6.5.0.0',
            Feature::deprecatedClassMessage(__CLASS__, 'v6.5.0.0', 'Shopware\Core\Checkout\Customer\Event\AddressListingCriteriaEvent')
        );

        return $this->salesChannelContext->getContext();
    }

    public function getSalesChannelContext(): SalesChannelContext
    {
        Feature::triggerDeprecationOrThrow(
            'v6.5.0.0',
            Feature::deprecatedClassMessage(__CLASS__, 'v6.5.0.0', 'Shopware\Core\Checkout\Customer\Event\AddressListingCriteriaEvent')
        );

        return $this->salesChannelContext;
    }
}
