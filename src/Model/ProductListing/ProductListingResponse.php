<?php

namespace App\Model\ProductListing;

use App\Model\ExternalProduct\Products;

class ProductListingResponse
{
    private Filters $filters;
    private Products $products;

    public function getFilters(): Filters
    {
        return $this->filters;
    }

    public function setFilters(Filters $filters): void
    {
        $this->filters = $filters;
    }

    public function getProducts(): Products
    {
        return $this->products;
    }

    public function setProducts(Products $products): void
    {
        $this->products = $products;
    }

    public function __construct(
        Products $products,
        Filters $filters,
    )
    {
        $this->setProducts($products);
        $this->setFilters($filters);
    }
}