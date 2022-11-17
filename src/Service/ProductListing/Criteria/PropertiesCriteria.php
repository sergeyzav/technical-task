<?php

namespace App\Service\ProductListing\Criteria;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\ProductSearchModel;
use JetBrains\PhpStorm\Pure;

class PropertiesCriteria implements CriteriaInterface
{

    #[Pure] public function shouldApply(ProductSearchModel $model): bool
    {
        return !empty($model->getProperties());
    }

    public function apply(ProductSearchModel $model, array $products): array
    {
        return array_filter($products, function (Product $product) use ($model) {
            foreach ($product->getProperties() as $property) {
                if (in_array($property, $model->getProperties())) {
                    return true;
                }
            }

            return false;
        });
    }

}