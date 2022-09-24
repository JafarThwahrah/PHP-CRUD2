<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Patients Management</title>
</head>

<body>

</body>

</html>

<?php
require_once 'conn.php';
$data = ($_REQUEST['id']);
$sql = "SELECT `Name`,Age,`Address`, ID from patients where ID=:idu";
$query = $conn->prepare($sql);
$query->bindParam(':idu', $data, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
?>
    <h3 class="text-center">Update patient information</h3>
    <form class="container-lg" name="updateform" method="POST">

        <div class="form-floating m-3">
            <input type="text" name="ID" value="<?php echo ($result->ID) ?>" class="form-control h-25" id="dd" placeholder="ID" required>
            <label for="dd">ID</label>
        </div>

        <div class="form-floating m-3">
            <input type="text" value="<?php echo ($result->Name) ?>" name="Name" class="form-control h-25" id="Na" placeholder="Name" required>
            <label for="Na">Name</label>
        </div>
        <div class="form-floating m-3">
            <input type="text" value="<?php echo ($result->Age) ?>" name="Age" class="form-control h-25" id="ag" placeholder="Age" required>
            <label for="ag">Age</label>
        </div>
        <div class="form-floating m-3">
            <input type="text" value="<?php echo ($result->Address) ?>" class="form-control h-25" name="Address" id="ad" placeholder="Address" required>
            <label for="ad">Address</label>
            <input class="btn btn-primary mt-4" name="update" type="submit" value="update">
            <a href="index.php" class="btn btn-outline-dark mt-4">Cancel</a>

        </div>

    </form>



<?php
}
?>


<?php
// $data = ($_REQUEST['id']);
if (isset($_POST['update'])) {
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];
    $ID = $_POST['ID'];


    echo $ID . $Name . $Age . $Address . "<br>";


    $sql = "UPDATE `patients` SET `Name` =:n,`Age` =:a, `Address` =:adrs, `ID` =:idd WHERE `patients`.`ID` =:iddd";
    $query = $conn->prepare($sql);


    $query->bindParam(':n', $Name, PDO::PARAM_STR);
    $query->bindParam(':a', $Age, PDO::PARAM_STR);
    $query->bindParam(':adrs', $Address, PDO::PARAM_STR);
    $query->bindParam(':idd', $ID, PDO::PARAM_STR);
    $query->bindParam(':iddd', $data, PDO::PARAM_STR);



    $query->execute();




    echo "<script>alert('Record Updated successfully');</script>";
    echo "<script>window.location.href='index.php'</script>";
}



?>