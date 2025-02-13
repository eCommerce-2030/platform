<?php declare(strict_types=1);

namespace Shopware\Storefront\Page\Account\Register;

use Shopware\Core\Framework\Script\Execution\Awareness\SalesChannelContextAwareTrait;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Page\Account\Login\AccountLoginPage;
use Shopware\Storefront\Page\PageLoadedHook;

/**
 * Triggered when the AccountLoginPage is loaded
 *
 * @package customer-order
 *
 * @hook-use-case data_loading
 *
 * @since 6.4.8.0
 */
class AccountRegisterPageLoadedHook extends PageLoadedHook
{
    use SalesChannelContextAwareTrait;

    public const HOOK_NAME = 'account-register-page-loaded';

    private AccountLoginPage $page;

    public function __construct(AccountLoginPage $page, SalesChannelContext $context)
    {
        parent::__construct($context->getContext());
        $this->salesChannelContext = $context;
        $this->page = $page;
    }

    public function getName(): string
    {
        return self::HOOK_NAME;
    }

    public function getPage(): AccountLoginPage
    {
        return $this->page;
    }
}
