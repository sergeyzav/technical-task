<?php

namespace App\Service\ProductListing;

use App\Model\ExternalProduct\Products;
use App\Model\ProductListing\ProductListingResponse;
use App\Model\ProductListing\ProductSearchModel;

class ProductListingService
{
    public function __construct(
        private ProductSearchService $productSearchService,
        private ProductFilterService $productFilterService,
    )
    {
    }

    public function getProductsWithFilters(ProductSearchModel $productSearchModel): ProductListingResponse
    {
        $products = $this->productSearchService->search($productSearchModel);
        $filters = $this->productFilterService->getFilters($productSearchModel);

        return new ProductListingResponse(new Products($products), $filters);
    }
}