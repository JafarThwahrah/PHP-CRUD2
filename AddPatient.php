<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Document</title>
</head>








<?php
require_once 'conn.php';

if (isset($_POST['insert'])) {

    var_dump($_POST);
    // Posted Values
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];
    $sql = "INSERT INTO `patients` (`Name`, `Age`, `Address`) VALUES (:n, :age,:add)";

    $query = $conn->prepare($sql);

    $query->bindParam(':n', $Name, PDO::PARAM_STR);
    $query->bindParam(':age', $Age, PDO::PARAM_STR);
    $query->bindParam(':add', $Address, PDO::PARAM_STR);



    $query->execute();

    $lastInsertId = $conn->lastInsertId();
    if ($lastInsertId) {
        // Message for successfull insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }

}


?>
















<body>

<h3 class="text-center">Add new Patient</h3>


    <form class="container-lg" name="createForm" method="POST">


        <div class="form-floating m-3">
            <input type="text" name="Name" class="form-control h-25" id="Name" placeholder="Name" required>
            <label for="Name">Name</label>
        </div>
        <div class="form-floating m-3">
            <input type="text" name="Age" class="form-control h-25" id="Age" placeholder="Age" required>
            <label for="Age">Age</label>
        </div>
        <div class="form-floating m-3">
            <input type="text" class="form-control h-25" name="Address" id="Address" placeholder="Address" required>
            <label for="Address">Address</label>
            <input class="btn btn-outline-primary mt-4" name="insert" type="submit" value="Submit">
        </div>

    </form>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>