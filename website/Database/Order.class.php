<?php

class Order extends Database
{
    public $message;

    // Method to insert order data into the bestel table
    public function placeOrder($orderData)
    {
        $stmt = $this->pdo->prepare("INSERT INTO bestel (name, email, phone, address, city, state, zip) 
        VALUES
        (:name, :email, :phone, :address, :city, :state, :zip)");
        
        $stmt->execute($orderData);
        
        $this->message = "Order placed successfully.";

        return $this->message;


        
    }
}
