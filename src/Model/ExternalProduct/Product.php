<?php

namespace App\Model\ExternalProduct;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Product
{
    #[SerializedName('id')]
    private int $id;

    private string $name;

    private string $region;

    private float $price;

    private string $basePrice;

    private string $manufacturer;

    private array $properties;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getBasePrice(): string
    {
        return $this->basePrice;
    }

    public function setBasePrice(string $basePrice): void
    {
        $this->basePrice = $basePrice;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(string $properties): void
    {
        $this->properties = $properties === '' ? [] : explode(',', $properties);
    }

}
