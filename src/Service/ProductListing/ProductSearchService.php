<?php

namespace App\Service\ProductListing;

use App\Model\ProductListing\ProductSearchModel;
use App\Service\ProductListing\Criteria\CriteriaInterface;
use App\Service\ProductProvider\ProductProviderInterface;

class ProductSearchService
{
    /**
     * ProductSearchService constructor.
     *
     * @param ProductProviderInterface $productProvider
     * @param CriteriaInterface[]      $filters
     */
    public function __construct(
        private ProductProviderInterface $productProvider,
        private array $filters,
    )
    {

    }

    public function search(ProductSearchModel $productSearchModel)
    {
        $products = $this->productProvider->getProducts();

        foreach ($this->filters as $filter) {
            if ($filter->shouldApply($productSearchModel)) {
                $products = $filter->apply($productSearchModel, $products);
            }
        }

        return array_values($products);

    }
}