<?php
declare(strict_types=1);

namespace Shopware\Storefront\Theme\ConfigLoader;

use Shopware\Core\Framework\Context;

/**
 * @package storefront
 */
abstract class AbstractAvailableThemeProvider
{
    abstract public function getDecorated(): AbstractAvailableThemeProvider;

    /**
     * @return array<string, string>
     */
    abstract public function load(Context $context): array;
}
