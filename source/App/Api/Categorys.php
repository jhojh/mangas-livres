<?php

namespace Source\App\Api;

// Introduzindo token de segurança

use Source\Models\Category;
use Source\Core\TokenJWT;

class Categorys extends Api
{
    public function construct()
    {
        parent::construct();
    }
    public function insertCategory (array $data)
    {
         // $this->auth();
        if(in_array("", $data)) {
            $this->back([
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $category = new Category(
            null,
            $data["name_catg"],
        );

        $insertcategory = $category->insert();

        if(!$insertcategory){
            $this->back([
                "type" => "error",
                "message" => $category->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => "Categoria cadastrada com sucesso!"
        ]);

    }
    public function listCategory(array $data)
    {
        // quando a rota não necessita de autenticação, não evoca o método $this->auth()
        $category = new Category();
        // var_dump($data);
        $listCategory = $category->listCategory($data);
        $this->back($listCategory);
    }
    
    public function listById(array $data)
{
    $service = new Category();
    $category = $service->getCategoryById($data["id"]);
    $this->back($category);
}
public function updateCategory(array $data)
{
     // $this->auth();
    var_dump($data);
    $service = new Category(
        $data["id"],
            $data["name_catg"]
    );
    $category = $service->updateCategory();
    //$this->back($product);
    var_dump($category);
}

public function deleteCategory(array $data)
{
     // $this->auth();
    $service = new Category();
    $success = $service->deleteCategory($data);
    
    if(!$success){
        $this->back([
            "type" => "error",
            "message" => $service->getMessage()
        ]);
        return;
    }

    $this->back([
        "type" => "success",
        "message" => "categoria excluida com sucesso!"
    ]);
}
    
}