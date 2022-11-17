<?php

namespace App\Model\ProductListing;

class Filter
{
    private string $name;

    /**
     * @var FilterOption[]
     */
    private array $options;

    /**
     * @return FilterOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param FilterOption[] $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function __construct(array $options, string $name)
    {
        $this->setOptions($options);
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}