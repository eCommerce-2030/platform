<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Store\Struct;

/**
 * @package merchant-services
 *
 * @codeCoverageIgnore
 */
class BinaryStruct extends StoreStruct
{
    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $creationDate;

    public static function fromArray(array $data): StoreStruct
    {
        return (new self())->assign($data);
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getCreationDate(): string
    {
        return $this->creationDate;
    }
}
