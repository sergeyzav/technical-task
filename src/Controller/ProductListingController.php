<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\ProductListing\ProductSearchModel;
use App\Service\ProductListing\ProductListingService;
use App\Model\ProductListing\ProductListingResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class ProductListingController extends AbstractController
{
    public function __construct(
        private ProductListingService $productListingService,
    )
    {

    }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Created criterion",
     *     @Model(type=ProductListingResponse::class)
     * )
     * @OA\RequestBody(@Model(type=ProductSearchModel::class))
     */
    #[Route(path: '/api/v1/products/search', methods: 'POST')]
    public function search(#[RequestBody] ProductSearchModel $productSearchModel): Response
    {
        return $this->json($this->productListingService->getProductsWithFilters($productSearchModel));
    }
}