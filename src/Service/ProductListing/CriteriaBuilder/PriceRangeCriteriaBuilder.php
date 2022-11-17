<?php

namespace App\Service\ProductListing\CriteriaBuilder;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\Filter;
use App\Model\ProductListing\FilterOption;
use App\Model\ProductListing\ProductSearchModel;
use App\Service\ProductListing\PriceRangeType;

class PriceRangeCriteriaBuilder implements CriteriaBuilderInterface
{
    const FILTER_NAME = 'price';

    public function __construct(
        private PriceRangeType $priceRangeResolver,
    )
    {

    }

    /**
     * @param ProductSearchModel $model
     * @param Product[]          $products
     *
     * @return Filter
     */
    public function build(ProductSearchModel $model, array $products): Filter
    {
        $options = [];

        foreach ($products as $product) {
            $priceRange = $this->priceRangeResolver->getRangeByPrice($product->getPrice());

            if (isset($options[$priceRange])) {
                $options[$priceRange]++;
            } else {
                $options[$priceRange] = 1;
            }
        }

        $preparedOptions = [];

        foreach ($options as $value => $amount) {
            $isApplied = in_array($value, $model->getPriceRanges());

            $preparedOptions[] = new FilterOption(
                $value,
                $isApplied,
                $isApplied ? null : $amount
            );
        }
        return new Filter($preparedOptions, self::FILTER_NAME);
    }

    public function getFormWithoutCurrentFilter(ProductSearchModel $model): ProductSearchModel
    {
        $result = clone $model;
        $result->setPriceRanges([]);
        return $result;
    }

}
