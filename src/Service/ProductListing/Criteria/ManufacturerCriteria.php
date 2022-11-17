<?php

namespace App\Service\ProductListing\Criteria;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\ProductSearchModel;
use JetBrains\PhpStorm\Pure;

class ManufacturerCriteria implements CriteriaInterface
{
    #[Pure] public function shouldApply(ProductSearchModel $model): bool
    {
        return !empty($model->getManufacturers());
    }


    public function apply(ProductSearchModel $model, array $products): array
    {
        return array_filter($products, function (Product $product) use ($model) {
            return in_array($product->getManufacturer(), $model->getManufacturers());
        });
    }

}