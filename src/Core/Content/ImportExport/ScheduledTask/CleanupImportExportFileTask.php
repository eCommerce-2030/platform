<?php declare(strict_types=1);

namespace Shopware\Core\Content\ImportExport\ScheduledTask;

use Shopware\Core\Framework\MessageQueue\ScheduledTask\ScheduledTask;

/**
 * @package system-settings
 */
class CleanupImportExportFileTask extends ScheduledTask
{
    public static function getTaskName(): string
    {
        return 'import_export_file.cleanup';
    }

    public static function getDefaultInterval(): int
    {
        return 86400; //24 hours
    }
}
