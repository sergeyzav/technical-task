<?php

namespace App\Model\ProductListing;

class Filters
{
    /**
     * @var Filter[]
     */
    private array $filters;

    /**
     * @return Filter[]
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param Filter[] $filters
     */
    public function setFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    public function __construct(array $filters)
    {
        $this->setFilters($filters);
    }
}