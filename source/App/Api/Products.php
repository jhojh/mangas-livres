<?php

namespace Source\App\Api;

// Introduzindo token de segurança

use Source\Models\Product;
use Source\Core\TokenJWT;

class Products extends Api
{
    public function construct()
    {
        parent::construct();
    }
    public function insertProduct (array $data)
    {
        // $this->auth();
        if(in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $product = new Product(
            null,
            $data["name_prod"],
            $data["value"],
            $data["amount"],
            $data["url_prod"],
            $data["sinopse"],
            $data["category_id"],
            $data["authors_id"],
        );

        $insertProduct = $product->insert();

        if(!$insertProduct){
            $this->back([
                "type" => "error",
                "message" => $product->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Produto cadastrado com sucesso!"
        ]);

    }
    public function listProduct(array $data)
    {
        // quando a rota não necessita de autenticação, não evoca o método $this->auth()
        $product = new Product();
        $listProducts = $product->listProduct($data);
        $this->back($listProducts);
    }
    
    public function listById(array $data)
{
    $service = new Product();
    $product = $service->getProductById($data["id"]);
    $this->back($product);
}
public function updateProduct(array $data)
{
    // $this->auth();
$service= new Product(
    $data["id"],
    $data["name_prod"],
    $data["value"],
    $data["amount"],
    $data["url_prod"],
    $data["sinopse"],
    $data["category_id"],
    $data["authors_id"]
);
$product=$service->updateProduct();
var_dump($product);

}

public function deleteProduct(array $data)
{
    // $this->auth();
    $service = new Product();
    $success = $service->deleteProduct($data["id"]);
    
    if(!$success){
        $this->back([
            "type" => "error",
            "message" => $service->getMessage()
        ]);
        return;
    }

    $this->back([
        "type" => "success",
        "message" => "Produto excluido com sucesso!"
    ]);
}
    
}