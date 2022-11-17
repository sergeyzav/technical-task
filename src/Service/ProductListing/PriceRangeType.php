<?php

namespace App\Service\ProductListing;

use JetBrains\PhpStorm\Pure;

class PriceRangeType
{
    const FROM_0_TO_10 = 'from_0_to_10';
    const FROM_10_TO_20 = 'from_10_to_20';
    const FROM_20_TO_50 = 'from_20_to_50';
    const OVER_50 = 'over_50';

    public static function getAllPriceRangeTypes(): array
    {
        return  [
            self::FROM_0_TO_10,
            self::FROM_10_TO_20,
            self::FROM_20_TO_50,
            self::OVER_50,
        ];
    }

    public function inRange(float $price, string $range): bool
    {
        switch ($range) {
            case self::FROM_0_TO_10:
                return $price > 0 && $price < 10;
            case self::FROM_10_TO_20:
                return $price >= 10 && $price < 20;
            case self::FROM_20_TO_50:
                return $price >= 20 && $price < 50;
            case self::OVER_50:
                return $price >= 50;
        }
    }

    #[Pure] public function getRangeByPrice(float $price): string
    {
        foreach (self::getAllPriceRangeTypes() as $rangeType) {
            if ($this->inRange($price, $rangeType)) {
                return  $rangeType;
            }
        }
    }
}