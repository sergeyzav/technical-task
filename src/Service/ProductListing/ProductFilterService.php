<?php

namespace App\Service\ProductListing;

use App\Model\ProductListing\Filters;
use App\Model\ProductListing\ProductSearchModel;
use App\Service\ProductListing\Criteria\CriteriaInterface;
use App\Service\ProductListing\CriteriaBuilder\CriteriaBuilderInterface;
use App\Service\ProductProvider\ProductProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;

class ProductFilterService
{

    /**
     * ProductFilterService constructor.
     *
     * @param ProductSearchService       $productSearchService
     * @param CriteriaBuilderInterface[] $filterBuilders
     */
    public function __construct(
        private ProductSearchService $productSearchService,
        private array $filterBuilders,
    ) {
    }

    public function getFilters(ProductSearchModel $productSearchModel): Filters
    {
        $filters = [];

        foreach ($this->filterBuilders as $filterBuilder) {

            $model = $filterBuilder->getFormWithoutCurrentFilter($productSearchModel);

            $products = $this->productSearchService->search($model);

            $filter = $filterBuilder->build($productSearchModel, $products);

            if (!empty($filter->getOptions())) {
                $filters[] = $filter;
            }
        }

        return new Filters($filters);
    }

}