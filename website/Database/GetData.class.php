<?php

require_once("Database.class.php");
class GetData
{
    private $pdo;
    private string $productTable = "Producten";
    private string $ShoppingCartTable = "ShoppingCart";
    private string $userTable = "User";

    public function __construct(Database $pdo)
    {
        $this->pdo = $pdo;
    }
    // Get product
    public function getProduct($id = null, $rent_buy = null): array
    {
        $sql = "SELECT * FROM $this->productTable WHERE rent_buy = :rent_buy";
        $stmt = $this->pdo->prepare($sql, ["rent_buy" => $rent_buy]);
        $product = $stmt->fetchAll();

        // Get product by id
        if ($id !== null) {
            $sql = "SELECT * FROM Producten WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql, [":id" => $id]);
            $product = $stmt->fetch();
        }
        return $product;
    }

    public function getUser($userName): array
    {
        $sql = "SELECT * FROM $this->userTable WHERE user_name = :userName";
        $stmt = $this->pdo->prepare($sql, ["userName" => $userName]);
        $user = $stmt->fetch();
        return $user;
    }

    public function getCart(array $id): array
    {
        $sql = "SELECT * FROM $this->ShoppingCartTable
        INNER JOIN $this->productTable ON ShoppingCart.Product_id = Producten.product_id WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql, $id);
        $product = $stmt->fetchAll();
        return $product;
    }
}
