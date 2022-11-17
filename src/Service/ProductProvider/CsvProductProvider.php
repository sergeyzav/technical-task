<?php

namespace App\Service\ProductProvider;

use App\Model\ExternalProduct\Product;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class CsvProductProvider implements ProductProviderInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private string $fileName,
    )
    {
    }


    public function getProducts(): iterable
    {
        $content  = file_get_contents($this->fileName);

        return $this->serializer->deserialize($content, Product::class . '[]', 'csv', [
            CsvEncoder::END_OF_LINE => "\n",
            CsvEncoder::DELIMITER_KEY => ';',
            CsvEncoder::KEY_SEPARATOR_KEY => ',',
        ]);
    }

}