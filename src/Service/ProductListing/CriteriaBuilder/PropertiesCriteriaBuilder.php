<?php

namespace App\Service\ProductListing\CriteriaBuilder;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\Filter;
use App\Model\ProductListing\FilterOption;
use App\Model\ProductListing\ProductSearchModel;

class PropertiesCriteriaBuilder implements CriteriaBuilderInterface
{
    const FILTER_NAME = 'properties';

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
            foreach ($product->getProperties() as $property) {
                if ($property === '') {
                    continue;
                }

                if (isset($options[$property])) {
                    $options[$property]++;
                } else {
                    $options[$property] = 1;
                }
            }
        }

        $preparedOptions = [];

        foreach ($options as $value => $amount) {
            $isApplied = in_array($value, $model->getProperties());

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
        $result->setProperties([]);
        return $result;
    }

}
