<?php

namespace App\Service\ProductProvider;

interface ProductProviderInterface
{
    public function getProducts(): iterable;
}