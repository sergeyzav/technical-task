<?php

namespace App\Service\ProductListing\CriteriaBuilder;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\Filter;
use App\Model\ProductListing\ProductSearchModel;

interface CriteriaBuilderInterface
{
    /**
     * @param ProductSearchModel $model
     * @param Product[]          $products
     *
     * @return Filter
     */
    public function build(ProductSearchModel $model, array $products): Filter;

    public function getFormWithoutCurrentFilter(ProductSearchModel $model): ProductSearchModel;
}
