<?php
include "Model/database/DBConnect.php";
include "Model/Customer.php";
include "Model/CustomerDB.php";
include "Controller/CustomerController.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$customerController = new \controller\CustomerController();

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;

switch ($page) {
    case 'list':
        $customerController->list();
        break;
    case 'delete':
        $customerController->delete();
        break;
    case 'add':
        $customerController->add();
        break;
    case 'formEdit':
        $customerController->getInfoById();
        break;
    case 'update':
        $customerController->update();
        break;
    default:
        $customerController->index();
}

?>
</body>
</html>
