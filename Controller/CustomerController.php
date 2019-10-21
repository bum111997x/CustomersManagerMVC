<?php

namespace controller;

use model\Customer;
use model\CustomerDB;
use model\database\DBConnect;

class CustomerController
{
    protected $customerDB;

    public function __construct()
    {
        $db = new DBConnect('mysql:host=localhost;dbname=customermanagermvc', 'BUM', '1');
        $this->customerDB = new CustomerDB($db->connect());
    }

    public function index()
    {
        $customers = $this->customerDB->getAll();
        include "View/list.php";
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->customerDB->delete($id);
        header('Location:index.php');
    }

    public function add()
    {
        include "View/add.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->add($customer);
            header("Location: index.php");
        }
    }

    public function getInfoById()
    {
        $id = $_GET['id'];
        $customer = $this->customerDB->getInfoById($id);
        include "View/formEdit.php";
    }

    public function update()
    {
        $id=$_POST['id'];
        $customer = new Customer($_POST['name'],$_POST['email'],$_POST['address']);
        $this->customerDB->update($id,$customer);
        header("Location:index.php");
    }
}