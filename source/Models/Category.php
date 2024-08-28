<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Category extends Model
{
    private $id;
    private $name_catg;
    private $message;

    public function __construct(
        int $id = null,
        string $name_catg = null,
    ) 
    {
        $this->id = $id;
        $this->name_catg = $name_catg;
        $this->entity = "categorys";
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
        return $this->name_catg;
    }

    public function setName(?string $name_catg): void
    {
        $this->name_catg = $name_catg;
    }
    // public function setCategories_id(?string $category_id): void
    // {
    //     $this->categories = $categories_id;
    // }
    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getCategoryById(int $id): array
    {
        $query = "SELECT categorys.id, categorys.name_catg FROM categorys WHERE categorys.id = :category_id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":category_id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listCategory()
    {

        $query = "SELECT * FROM categorys";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
   
    public function updateCategory(): bool
    {
        
        $conn = Connect::getInstance();

    $checkQuery = "SELECT name_catg FROM categorys WHERE name_catg = :name_catg";
    
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":name_catg", $name_catg);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 1) {
        $this->message = "Nome já cadastrado.";
        return false;
    }

        $query = "UPDATE categorys 
        SET categorys.name_catg = :name_catg
        WHERE categorys.id = :id";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name_catg", $this->name_catg);
        
        try {
            $stmt->execute();
            $this->message = "Categoria Atualizada com sucesso ";
            return true;
        } catch (PDOException) {
            $this->message = "Erro ao Atualizar a categoria: ";
            return false;
        }
    }

    public function deleteCategory(int $id): bool
{

    $conn = Connect::getInstance();

    $checkQuery = "SELECT id FROM categorys WHERE id = :id";
    
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":id", $id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() === 0) {
        $this->message = "categoria não encontrado.";
        return false;
    }

    $query = "DELETE FROM categorys WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);

    try {
        $stmt->execute();
        $this->message = "categoria Excluido com sucesso ";
        return true;
    } catch (PDOException) {
        $this->message = "Erro ao excluir o categoria: ";
        return false;
    }
}



public function insert(): ?int
{

    $conn = Connect::getInstance();


    $query = "SELECT * FROM categorys WHERE name_catg LIKE :name_catg";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name_catg", $this->name_catg);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $this->message = "Categoria já cadastrada!";
        return false;
    }

    $query = "INSERT INTO categorys (name_catg) 
              VALUES (:name_catg)";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name_catg", $this->name_catg);

    try {
        $stmt->execute();
        return $conn->lastInsertId();
    } catch (PDOException) {
        $this->message = "Por favor, informe todos os campos";
        return false;
    }
}
}
