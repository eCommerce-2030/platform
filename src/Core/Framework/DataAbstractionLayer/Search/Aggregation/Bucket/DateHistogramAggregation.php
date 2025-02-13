<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Search\Aggregation\Bucket;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Aggregation\Aggregation;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;

/**
 * @final
 */
class DateHistogramAggregation extends BucketAggregation
{
    public const PER_MINUTE = 'minute';
    public const PER_HOUR = 'hour';
    public const PER_DAY = 'day';
    public const PER_WEEK = 'week';
    public const PER_MONTH = 'month';
    public const PER_QUARTER = 'quarter';
    public const PER_YEAR = 'year';

    private string $interval;

    public function __construct(
        string $name,
        string $field,
        string $interval,
        private ?FieldSorting $sorting = null,
        ?Aggregation $aggregation = null,
        private ?string $format = null,
        private ?string $timeZone = null
    ) {
        parent::__construct($name, $field, $aggregation);

        $interval = mb_strtolower($interval);
        if (!\in_array($interval, [self::PER_MINUTE, self::PER_HOUR, self::PER_DAY, self::PER_WEEK, self::PER_MONTH, self::PER_QUARTER, self::PER_YEAR], true)) {
            throw new \RuntimeException('Provided date histogram interval is not supported');
        }

        if (\is_string($timeZone) && !\in_array($timeZone, \DateTimeZone::listIdentifiers(\DateTimeZone::ALL_WITH_BC), true)) {
            throw new \InvalidArgumentException(\sprintf('Given "%s" is not a valid timezone', $timeZone));
        }

        $this->interval = $interval;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function getInterval(): string
    {
        return $this->interval;
    }

    public function getSorting(): ?FieldSorting
    {
        return $this->sorting;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }
}
