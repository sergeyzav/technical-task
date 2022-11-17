<?php

namespace App\Model\ProductListing;

use OpenApi\Annotations as OA;

class ProductSearchModel
{
    /**
     * @OA\Property(type="array", @OA\Items(type="string"))
     */
    private array $properties = [];

    /**
     * @OA\Property(type="array", @OA\Items(type="string"))
     */
    private array $manufacturers = [];

    /**
     * @OA\Property(type="array", @OA\Items(type="string"))
     */
    private array $priceRanges = [];

    /**
     * @OA\Property(type="array", @OA\Items(type="string"))
     */
    private array $regions = [];


    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    public function getManufacturers(): array
    {
        return $this->manufacturers;
    }

    public function setManufacturers(array $manufacturers): void
    {
        $this->manufacturers = $manufacturers;
    }

    public function getPriceRanges(): array
    {
        return $this->priceRanges;
    }

    public function setPriceRanges(array $priceRanges): void
    {
        $this->priceRanges = $priceRanges;
    }

    public function getRegions(): array
    {
        return $this->regions;
    }


    public function setRegions(array $regions): void
    {
        $this->regions = $regions;
    }

}