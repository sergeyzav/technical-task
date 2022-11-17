<?php

namespace App\Service\ProductListing\Criteria;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\ProductSearchModel;
use App\Service\ProductListing\PriceRangeType;
use JetBrains\PhpStorm\Pure;

class PriceCriteria implements CriteriaInterface
{

    public function __construct(
        private PriceRangeType $priceRangeResolver,
    )
    {
    }

    #[Pure] public function shouldApply(ProductSearchModel $model): bool
    {
        return !empty($model->getPriceRanges());
    }

    public function apply(ProductSearchModel $model, array $products): array
    {
        return array_filter($products, function (Product $product) use ($model) {
            foreach ($model->getPriceRanges() as $priceRange) {
                if ($this->priceRangeResolver->inRange($product->getPrice(), $priceRange)) {
                    return true;
                }
            }

            return false;
        });
    }

}