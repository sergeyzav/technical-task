<?php

namespace App\Model\ProductListing;

class FilterOption
{
    private string $value;
    private bool $isApplied;
    private ?int $amount;


    public function getAmount(): ?int
    {
        return $this->amount;
    }


    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function isApplied(): bool
    {
        return $this->isApplied;
    }

    public function setIsApplied(bool $isApplied): void
    {
        $this->isApplied = $isApplied;
    }

    public function __construct(
        string $value,
        bool $isApplied,
        ?int $amount,

    )
    {
        $this->setValue($value);
        $this->setIsApplied($isApplied);
        $this->setAmount($amount);
    }
}