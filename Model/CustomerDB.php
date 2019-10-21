<?php

namespace model;

class CustomerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customermanager";
        $stmt = $this->connection->query($sql);
        $result = $stmt->fetchAll();
        $customers = [];

        foreach ($result as $item) {
            $customer = new Customer($item['name'], $item['email'], $item['address']);
            $customer->setId($item['id']);
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM customermanager WHERE id=$id";
        $stmt = $this->connection->query($sql);
    }

    public function add($customer)
    {
        $sql = "INSERT INTO customermanager(name,email,address) VALUES (:name,:email,:address)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':name', $customer->name);
        $stmt->bindParam(':email', $customer->email);
        $stmt->bindParam(':address', $customer->address);
        $stmt->execute();
    }

    public function getInfoById($id)
    {
        $sql = "SELECT name,email,address FROM customermanager WHERE id=:id ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $customer = $stmt->fetch();
        $customer = new Customer($customer['name'], $customer['email'], $customer['address']);
        return $customer;
    }

    public function update($id,$customer)
    {
        $sql = "UPDATE customermanager SET name=:name,email=:email,address=:address WHERE id=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':name',$customer->name);
        $stmt->bindParam(':email',$customer->email);
        $stmt->bindParam(':address',$customer->address);
        $stmt->execute();
    }
}