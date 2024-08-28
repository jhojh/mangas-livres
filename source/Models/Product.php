<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Product extends Model
{
    private $id;
    private $name_prod;
    private $value;
    private $amount;
    private $url_prod;
    private $sinopse;
    private $category_id;
    private $authors_id;
    private $message;

    public function __construct(
        int $id = null,
        string $name_prod = null,
        float $value = null,
        int $amount = null,
        string $url_prod = null,
        string $sinopse = null,
        int $category_id = null,
        int $authors_id = null
    ) {
        $this->id = $id;
        $this->name_prod = $name_prod;
        $this->value = $value;
        $this->amount = $amount;
        $this->url_prod = $url_prod;
        $this->sinopse = $sinopse;
        $this->category_id = $category_id;
        $this->authors_id = $authors_id;
        $this->entity = "products";
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name_prod;
    }

    public function setName(?string $name_prod): void
    {
        $this->name_prod = $name_prod;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): void
    {
        $this->value = $value;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    public function setUrl(?string $url_prod): void
    {
        $this->url_prod = $url_prod;
    }
    public function getUrl(): ?string
    {
        return $this->url_prod;
    }

    

    public function getSinopse(): ?string
    {
        return $this->sinopse;
    }
    public function setSinopse(?string $sinopse): void
    {
        $this->sinopse = $sinopse;
    }
    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?int $category_id): void
    {
        $this->category = $category_id;
    }
    public function getCategory_id(): ?int
    {
        return $this->category;
    }
    public function getAuthors(): ?int
    {
        return $this->authors;
    }

    public function setAuthors(?int $authors_id): void
    {
        $this->authors = $authors_id;
    }

    // public function setCategories_id(?string $category_id): void
    // {
    //     $this->categories = $categories_id;
    // }
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getProductById(int $id): array
    {
        $query = "SELECT 
                    products.id, 
                    products.name_prod, 
                    products.value, 
                    products.amount, 
                    products.url_prod,
                    products.sinopse,  
                    categorys.name_catg
                  FROM products
                  INNER JOIN categorys
                  ON products.category_id = categorys.id
                  WHERE products.id = :product_id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":product_id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listProduct()
    {

        $query = "SELECT * FROM products";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
   
    public function updateProduct(): bool
    {
        $conn=Connect::getInstance();
        $checkQuery="SELECT name_prod from products where name_prod=:name_prod";
        $checkStmt=$conn->prepare($checkQuery);
        $checkStmt->bindParam(":name_prod",$name_prod);
        $checkStmt->execute();

        if ($checkStmt->rowCount() === 1) {
            $this->message = "Nome já cadastrado.";
            return false;
        }
    

        $query = "UPDATE products 
        SET products.name_prod = :name_prod, 
            products.value = :value, 
            products.amount = :amount, 
            products.url_prod = :url_prod,
            products.sinopse = :sinopse,  
            products.category_id = :category_id,
            products.authors_id = :authors_id 
        WHERE products.id = :id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->bindParam(":name_prod", $this->name_prod);
        $stmt->bindParam(":value", $this->value);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":url_prod", $this->url_prod);
        $stmt->bindParam(":sinopse", $this->sinopse);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":authors_id", $this->authors_id);
        // {
        //     $this->id = $id;
        //     $this->name_prod = $name_prod;
        //     $this->value = $value;
        //     $this->amount = $amount;
        //     $this->url_prod = $url_prod;
        //     $this->sinopse = $sinopse;
        //     $this->category_id = $category_id;
        //     $this->authors_id = $authors_id;
        //     $this->entity = "products";
        // }
        try{ 
        $stmt->execute();
        $this->message="produto atualizado com sucesso";
        return true;
    } catch(PDOException){
        $this->message="Erro ao atualizar produto";
        return false;
    }
    }

    public function deleteProduct(int $id): bool
{

    $conn = Connect::getInstance();

    $checkQuery = "SELECT id FROM products WHERE id = :id";
    
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":id", $id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 0) {
        $this->message = "Mangá não encontrado.";
        return false;
    }

    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);

    try {
        $stmt->execute();
        $this->message = "Mangá Excluido com sucesso ";
        return true;
    } catch (PDOException) {
        $this->message = "Erro ao excluir o mangá: ";
        return false;
    }
}



    public function insert(): ?int
    {

        $conn = Connect::getInstance();


        $query = "SELECT * FROM products WHERE name_prod LIKE :name_prod";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name_prod", $this->name_prod);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $this->message = "Produto já cadastrado!";
            return false;
        }

        $query = "INSERT INTO products (name_prod, value, amount ,url_prod,sinopse, category_id,authors_id) 
                  VALUES (:name_prod, :value, :amount,:url_prod,  :sinopse , :category_id,:authors_id)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name_prod", $this->name_prod);
        $stmt->bindParam(":value", $this->value);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":url_prod", $this->url_prod);
        $stmt->bindParam(":sinopse", $this->sinopse);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":authors_id", $this->authors_id);
      
    try {
        $stmt->execute();
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        $this->message = "Erro ao inserir o produto: " . $e->getMessage();
        return false;
    }
    }
}
