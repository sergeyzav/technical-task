<?php

namespace App\Service\ProductListing\CriteriaBuilder;

use App\Model\ExternalProduct\Product;
use App\Model\ProductListing\Filter;
use App\Model\ProductListing\FilterOption;
use App\Model\ProductListing\ProductSearchModel;

class ManufacturerCriteriaBuilder implements CriteriaBuilderInterface
{
    const FILTER_NAME = 'manufacturer';

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
            if ($product->getManufacturer() === '') {
                continue;
            }

            if (isset($options[$product->getManufacturer()])) {
                $options[$product->getManufacturer()]++;
            } else {
                $options[$product->getManufacturer()] = 1;
            }
        }

        $preparedOptions = [];

        foreach ($options as $value => $amount) {
            $isApplied = in_array($value, $model->getManufacturers());

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
        $result->setManufacturers([]);
        return $result;
    }

}
