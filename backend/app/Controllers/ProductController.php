<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $products = [
            [
                "id" => 1,
                "name" => "Produit 1",
                "price" => 10000
            ],
            [
                "id" => 2,
                "name" => "Produit 2",
                "price" => 20000
            ]
        ];

        return $this->response->setJSON($products);
    }
}
?>