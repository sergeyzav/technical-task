<?php

namespace App\Model\ExternalProduct;

class Products
{
    /**
     * @var Product[]
     */
    private array $products;

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }


    public function __construct(array $products)
    {
        $this->setProducts($products);
    }
}