<?php
echo '<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
';
include('db.php');

$statment = $connection->prepare("SELECT * FROM `customer`; ");
$statment->execute();
echo "<a href='update.php?page=insert' class='btn btn-primary'>Insert</a>";
if (isset($_POST['page'])) {
    if ($_POST['page'] == "update") {
        $statment = $connection->prepare("UPDATE `customer` SET customer_name=?,customer_email=?,customer_phone=?,customer_country=?,customer_city=? WHERE customer_id=? ; ");
        $statment->execute(array(
            $_POST['customer_name'],
            $_POST['customer_email'],
            $_POST['customer_phone'],
            $_POST['customer_country'],
            $_POST['customer_city'],
            $_POST['user_id'],
        ));
    } else if ($_POST['page'] == "insert") {
        $statment = $connection->prepare("INSERT INTO `customer` (customer_name,customer_email,customer_phone,customer_country,customer_city) VALUES (?,?,?,?,?) ;");
        $statment->execute(array(
            $_POST['customer_name'],
            $_POST['customer_email'],
            $_POST['customer_phone'],
            $_POST['customer_country'],
            $_POST['customer_city'],
        ));
    }
}


$page = "All";
if (isset($_GET['page']) && isset(($_GET['user_id']))) {
    $page = $_GET['page'];
    $user_id = $_GET['user_id'];
}

// switch between Show, Index and Delete
switch ($page) {
    case ("show"):
        $statment = $connection->prepare("SELECT * FROM `customer` WHERE customer_id=?  ");
        $statment->execute(array($user_id));
        grap_data($statment, $page);
        echo "<a href='index.php' class='btn btn-success'>Go Back</a>";
        break;

    case ("delete"):
        $statment = $connection->prepare("DELETE FROM `customer`WHERE customer_id=? ");
        $statment->execute(array($user_id));
        header("Location:index.php");
        break;


    default:
        $statment = $connection->prepare("SELECT * FROM `customer` ");
        $statment->execute();
        grap_data($statment, $page);
}

function grap_data($statment, $page)
{
    foreach ($statment as $item) {

        echo "<h1>" . $item['customer_id'] . "</h1>";
        echo "<h1>" . $item['customer_name'] . "</h1>";
        echo "<h2>" . $item['customer_email'] . "</h2>";
        echo "<h3>" . $item['customer_phone'] . "</h3>";
        echo "<h4>" . $item['customer_country'] . "</h4>";
        echo "<h4>" . $item['customer_city'] . "</h4>";
        if ($page == "All") {
            echo "<a href='?page=show&user_id=" . $item['customer_id'] . "' class='btn btn-secondary'>Show</a>";
            echo "<a href='?page=delete&user_id=" . $item['customer_id'] . "' class='btn btn-danger'>Delete</a>";
            echo "<a href='update.php?page=update&user_id=" . $item['customer_id'] . "' class='btn btn-info'>Update</a>";
        }
        echo "<hr>";
    }
}

