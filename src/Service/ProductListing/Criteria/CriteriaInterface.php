<?php

namespace App\Service\ProductListing\Criteria;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\ProductSearchModel;

interface CriteriaInterface
{
    /**
     * @param ProductSearchModel $model
     * @param Product[]          $products
     *
     * @return iterable
     */
    public function apply(ProductSearchModel $model, array $products): array;

    public function shouldApply(ProductSearchModel $model): bool;
}