<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Dbal;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\Filter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\SingleFieldFilter;

/**
 * @internal
 */
class JoinGroup extends Filter
{
    /**
     * @param SingleFieldFilter[] $queries
     */
    public function __construct(
        private array $queries,
        private string $path,
        private string $suffix,
        private string $operator
    ) {
    }

    public function getFields(): array
    {
        $fields = [];
        foreach ($this->queries as $query) {
            foreach ($query->getFields() as $field) {
                $fields[] = $field;
            }
        }

        return $fields;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getSuffix(): string
    {
        return $this->suffix;
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function setOperator(string $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * @return SingleFieldFilter[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }
}
