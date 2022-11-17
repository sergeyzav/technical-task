<?php

namespace App\Service\ProductProvider\Exception;

use Throwable;

class FileNotFoundException extends \RuntimeException
{
    public function __construct(string $fileName)
    {
        parent::__construct("'{$fileName}' is not found.");
    }

}